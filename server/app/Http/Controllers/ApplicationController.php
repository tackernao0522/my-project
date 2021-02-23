<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostAppRequest;
use App\Models\PostApp;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApplicationController extends Controller
{
    public function showApplications()
    {
        $apps = PostApp::all();

        return view('welcome')->with('apps', $apps);
    }

    public function showApplicationForm()
    {
        return view('members.app_form');
    }

    public function postApplication(PostAppRequest $request)
    {
        $imageName = $this->saveImage($request->file('item-image'));

        $app = new PostApp();
        $app->image_file_name = $imageName;
        $app->title = $request->input('title');
        $app->description = $request->input('description');
        $app->user_id = $request->user()->id;
        $app->url = $request->input('url');
        $app->save();

        return redirect()->back()
            ->with('status', 'アプリを投稿しました。');
    }

    /**
     *
     * @param UploadedFile $file アップロードされたアプリ画像
     * @return string ファイル名
     */
    private function saveImage(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(220, 220)->save($tempPath);

        $filePath = Storage::disk('s3')
            ->putFile('item-images', new File($tempPath));

        return basename($filePath);
    }

    /**
     * 一時的なファイルを生成してパスを返す
     *
     * @return string ファイルパス
     */

    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }

    public function destroy(PostApp $app)
    {
        $app->delete();

        return redirect()->route('top');
    }

    public function like(Request $request, PostApp $app)
    {
        $app->likes()->detach($request->user()->id);
        $app->likes()->attach($request->user()->id);

        return [
            'id' => $app->id,
            'countLikes' => $app->count_likes,
        ];
    }

    public function unlike(Request $request, PostApp $app)
    {
        $app->likes()->detach($request->user()->id);

        return [
            'id' => $app->id,
            'countLikes' => $app->count_likes,
        ];
    }
}

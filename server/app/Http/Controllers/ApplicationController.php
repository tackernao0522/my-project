<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostAppRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\PostApp;
use App\Models\Tag;
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

    public function postApplication(PostAppRequest $request, PostApp $app)
    {
        $imageName = $this->saveImage($request->file('item-image'));

        $app = new PostApp();
        $app->image_file_name = $imageName;
        $app->title = $request->input('title');
        $app->language = $request->input('language');
        $app->framework = $request->input('framework');
        $app->description = $request->input('description');
        $app->user_id = $request->user()->id;
        $app->url = $request->input('url');
        $app->save();

        $request->tags->each(function ($tagName) use ($app) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $app->tags()->attach($tag);
        });

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

    public function showAppDetail(PostApp $app)
    {
        return view('apps.app_detail', ['app' => $app]);
    }

    public function showApplicationEditForm(PostApp $app)
    {
        $tagNames = $app->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        if (auth()->user()->id != $app->user_id) {
            return redirect(route('top'))->with('status', '権限がありません。');
        }
        return view('apps.edit_form', [
            'app' => $app,
            'tagNames' => $tagNames,
        ]);
    }

    public function editApplication(PostAppRequest $request, PostApp $app)
    {
        if ($request->has('item-image')) {
            $fileName = $this->saveImage($request->file('item-image'));
            $app->image_file_name = $fileName;
        }

        $app->title = $request->input('title');
        $app->language = $request->input('language');
        $app->framework = $request->input('framework');
        $app->description = $request->input('description');
        $app->url = $request->input('url');
        $app->save();

        $app->tags()->detach();
        $request->tags->each(function ($tagName) use ($app) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $app->tags()->attach($tag);
        });

        return redirect()->back()
            ->with('status', '更新しました。');
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

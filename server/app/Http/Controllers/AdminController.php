<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostAppRequest;
use App\Models\PostApp;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{

    public function __construct()
    {
        # 追加したmiddlewareを追加。
        $this->middleware('admin');
    }

    public function showApplicationForm()
    {
        return view('admin.app_form');
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

        $filePath = Storage::disk('public')
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostAppRequest;
use App\Models\PostApp;


class AdminController extends Controller
{

    public function __construct()
    {
        # 追加したmiddlewareを追加。
        $this->middleware('admin');
    }

    public function index()
    {
        $apps = PostApp::orderBy('id')->with(['user', 'likes', 'tags'])->paginate(6);

        return view('admin.app_index')->with('apps', $apps);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostApp;

class ApplicationController extends Controller
{
    public function showApplications(Request $request)
    {
        $apps = PostApp::all();

        return view('welcome')->with('apps', $apps);
    }

    public function destroy(PostApp $app)
    {
        $app->delete();

        return redirect()->route('top');
    }
}

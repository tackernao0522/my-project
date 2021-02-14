<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostApp;

class ApplicationController extends Controller
{
    public function showApplications(Request $request)
    {
        $apps = PostApp::all();
        // dd($apps);

        return view('welcome')->with('apps', $apps);
    }
}

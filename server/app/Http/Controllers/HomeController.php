<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $folder = $user->folders()->first();

        // まだひとつもフォルダを作っていなくればTodo_Topページをレスポンス
        if (is_null($folder)) {
            return view('todo_top');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクト
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}

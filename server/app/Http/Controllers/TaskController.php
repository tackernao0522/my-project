<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // 全てのフォルダを取得
        $folders = Folder::all();

        // 選ばれたフォルダを取得
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐付くタスクを取得
        $tasks = Task::where('folder_id', $current_folder->id)->get();

        return view('tasks.index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }
}

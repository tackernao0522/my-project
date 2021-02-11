<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Folder $folder)
    {
        // ユーザーのフォルダを取得
        $folders = Auth::user()->folders()->get();

        // 選ばれたフォルダに紐付くタスクを取得
        $tasks = $folder->tasks()->get();

        return view('tasks.index', [
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(Folder $folder)
    {
        return view('tasks.create', [
            'folder_id' => $folder->id,
        ]);
    }

    public function create(CreateTask $request, Folder $folder)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }

    public function showEditForm(Folder $folder, Task $task)
    {
        $this->checkRelation($folder, $task);

        return view('tasks.edit', ['task' => $task]);
    }

    public function edit(EditTask $request, Folder $folder, Task $task)
    {
        $this->checkRelation($folder, $task);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'folder' => $task->folder_id,
        ]);
    }

    private function checkRelation(Folder $folder, Task $task)
    {
        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
    }
}

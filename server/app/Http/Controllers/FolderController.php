<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder as RequestsCreateFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders.create');
    }

    public function create(CreateFolder $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;

        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }

    public function showEditForm(Folder $folder)
    {
        return view('folders.edit', ['folder' => $folder]);
    }

    public function edit(CreateFolder $request, Folder $folder)
    {
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ])->with('status', 'フォルダ名を更新しました。');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();

        // まだひとつもフォルダを作っていなくればTodo_Topページをレスポンス
        if (is_null($folder)) {
            return view('todo_top')->with('status', '指定のフォルダを削除しました。');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクト
        return redirect()
            ->route('todo', ['folder' => $folder->id])
            ->with('status', '指定のフォルダを削除しました。');
    }
}

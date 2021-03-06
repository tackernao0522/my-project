@extends('layouts.todo_content')

@section('title')
Todo
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8 mt-3 offset-2" style="text-align: center;">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col col-md-4">
      <nav class="panel panel-default">
        <div class="panel-heading">フォルダ</div>
        <div class="panel-body">
          <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
            フォルダを追加する
          </a>
        </div>
        <div class="list-group">
          @foreach($folders as $folder)
          <a href="{{ route('tasks.index', ['folder' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
            {{ $folder->title }}
            <form method="POST" action="{{ route('folders.destroy', ['folder' => $folder->id]) }}">
              @csrf
              @method('DELETE')
              <div class="text-right" style="margin-top: -20px;">
                <button type="submit" class="label-danger" style="border-radius: 10px; color: #fff;">削除</button>
              </div>
            </form>
          </a>
          <div class="panel-body" style="width: 300px; margin: 0 auto;">
            <a href="{{ route('folders.edit', ['folder' => $folder->id]) }}" class="btn btn-success btn-block">
              {{ $folder->title }}のフォルダ名を編集する
            </a>
          </div>
          @endforeach
        </div>
      </nav>
      <small style="color:crimson; display: block; margin: 10px 10px;">注: フォルダを削除するとタスクも同時に削除されます。</small>
    </div>
    <div class="column col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">タスク</div>
        <div class="panel-body">
          <div class="text-right">
            <a href="{{ route('tasks.create', ['folder' => $current_folder_id]) }}" class="btn btn-default btn-block">
              タスクを追加する
            </a>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>タイトル</th>
              <th>状態</th>
              <th>期限</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $task->title }}
                <form method="POST" action="{{ route('tasks.destroy', ['folder' => $task->folder_id, 'task' => $task->id]) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="label-danger" style="border-radius: 10px; color: #fff;">削除</button>
                </form>
              </td>
              <td><span class="label {{ $task->status_class }}">{{ $task->status_label }}</span></td>
              <td>{{ $task->formatted_due_date }}</td>
              <td><a class="label-link" href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}">編集</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

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
          </a>
          @endforeach
        </div>
      </nav>
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
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $task->title }}</td>
              <td><span class="label {{ $task->status_class }}">{{ $task->status_label }}</span></td>
              <td>{{ $task->formatted_due_date }}</td>
              <td><a class="label-link" href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}">編集</a></td>
              <form method="POST" action="{{ route('tasks.destroy', ['folder' => $task->folder_id, 'task' => $task->id]) }}">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="label-danger p-0" style="width: 36px; height: 20px; margin-left: -13px; font-weight: bold; font-size: 10px; color: #fff;">削除</button></td>
              </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
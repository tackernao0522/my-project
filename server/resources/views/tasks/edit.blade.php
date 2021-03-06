@extends('layouts.todo_content')

@section('title')
タスク編集
@endsection

@section('styles')
@include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">タスクを編集する</div>
        <div class="panel-body">
          @include('error_card_list')
          <form method="POST" action="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}">
            @csrf
            <div class=form-group>
              <label for="title">タイトル</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $task->title }}">
            </div>
            <div class="form-group">
              <label for="status">状態</label>
              <select name="status" id="status" class="form-control">
                @foreach(\App\Models\Task::STATUS as $key => $val)
                <option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : '' }}>
                  {{ $val['label'] }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="due_date">期限</label>
              <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') ?? $task->formatted_due_date }}">
            </div>
            <div class="text-right">
              <a class="btn btn-danger" href="{{ route('todo') }}">キャンセル</a>
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@include('share.flatpickr.scripts')
@endsection

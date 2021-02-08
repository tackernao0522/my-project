@extends('layouts.todo_content')

@section('title')
タスク追加
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">タスクを追加する</div>
        <div class="panel-body">
          @include('error_card_list')
          <form method="POST" action="{{ route('tasks.create', ['id' => $folder_id]) }}">
            @csrf
            <div class="form-group">
              <label for="title">タイトル</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('due_date') }}">
            </div>
            <div class="form-group">
              <label for="due_date">期限</label>
              <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('title') }}">
            </div>
            <div class="text-right">
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
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('due_date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date()
  });
</script>
@endsection

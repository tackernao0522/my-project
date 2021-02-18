@extends('layouts.todo_content')

@section('title')
フォルダ名編集
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">フォルダ名を編集する</div>
        <div class="panel-body">
          @include('error_card_list')
          <form method="POST" action="{{ route('folders.edit', ['folder' => $folder->id]) }}">
            @csrf
            <div class=form-group>
              <label for="title">タイトル</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $folder->title }}">
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

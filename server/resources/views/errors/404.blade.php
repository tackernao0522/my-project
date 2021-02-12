@extends('layouts.todo_content')

@section('title')
404エラー
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <div class="text-center">
        <p>お探しのページは見つかりませんでした。</p>
        <a href="{{ route('todo') }}" class="btn">
          ホームへ戻る
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.todo_content')

@section('title')
505エラー
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <div class="text-center">
        <p>サーバー側のエラーで正常なレスポンスが返せません。</p>
        <a href="{{ route('todo') }}" class="btn">
          ホームへ戻る
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

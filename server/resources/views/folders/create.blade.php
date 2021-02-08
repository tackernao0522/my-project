@extends('layouts.todo_content')

@section('title')
Todo
@endsection

@section('content')
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを追加する</div>
          <div class="panel-body">
            @include('error_card_list')
            <form method="post" action="{{ route('folders.create') }}">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
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
</main>
@endsection
@extends('layouts.app')

@section('title')
アプリ一覧
@endsection

@section('content')
<div class="container-sm">
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
        @foreach($apps as $app)
        <div class="card-group mt-4 mb-3 mx-auto">
            <div class="card" style="width: 18rem">
                <img src="/storage/item-images/{{ $app->image_file_name }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $app->title }}</h5>
                    <p>{{ $app->description }}</p>
                    <a class="btn btn-primary" href="{{ $app->url }}">使用する</a>
                    {{-- @if( Auth::id() === $app->user_id ) --}}
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $app->id }}" style="display: block; margin-left: 6rem; margin-top: -38px; color: #fff; width: 90px;">削除する</a>
                    <!-- modal -->
                    <div id="modal-delete-{{ $app->id }}" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('apps.destroy', ['app' => $app]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        {{ $app->title }}を削除します。よろしいですか？
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                        <button type="submit" class="btn btn-danger">削除する</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

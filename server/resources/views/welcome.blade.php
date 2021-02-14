@extends('layouts.app')

@section('title')
アプリ一覧
@endsection

@section('content')
<div class="container-sm">
    <div class="row">
        @foreach($apps as $app)
        <div class="card-group mt-4 mb-3 mx-auto">
            <div class="card" style="width: 18rem">
                <img src="/storage/item-images/{{ $app->image_file_name }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $app->title }}</h5>
                    <p>{{ $app->description }}</p>
                    <a class="btn btn-primary" href="{{ route('todo', [$app->id]) }}">使用する</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
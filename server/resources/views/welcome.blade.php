@extends('layouts.app')

@section('title')
アプリ一覧
@endsection

@section('content')
<div class="container-sm">
    <div class="row">
        <div class="card-group mt-4 mb-3 mx-auto">
            <div class="card" style="width: 18rem">
                <img src="/images/todo_app.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Todoアプリ</h5>
                    <p>Todoアプリです。</p>
                    <a class="btn btn-primary" href="{{ route('todo') }}">使用する</a>
                </div>
            </div>
        </div>
        <div class="card-group mt-4 mb-3 mx-auto">
            <div class="card" style="width: 18rem">
                <img src="/images/signin-image.jpg" class="card-img-top" style="height: 410px;">
                <div class="card-body">
                    <h5 class="card-title">Todoアプリ</h5>
                    <p>Todoアプリです。</p>
                    <a class="btn btn-primary" href="">使用する</a>
                </div>
            </div>
        </div>
        <div class="card-group mt-4 mb-3 mx-auto">
            <div class="card" style="width: 18rem">
                <img src="/images/signup-image.jpg" class="card-img-top" style="height: 410px;">
                <div class="card-body">
                    <h5 class="card-title">Todoアプリ</h5>
                    <p>Todoアプリです。</p>
                    <a class="btn btn-primary" href="">使用する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

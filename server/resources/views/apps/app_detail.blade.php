@extends('layouts.app')

@section('title')
{{ $app->title }} | アプリケーション詳細
@endsection

@section('content')
<div class="container-sm">
  <div class="text-center mt-4">
    <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $app->user->name }}さんの{{ $app->title }}</span>
  </div>
  <div class="row">
    <div class="card-group mt-4 mb-3 mx-auto">
      <div class="card" style="width: 18rem">
        <img src="{{ Storage::disk('s3')->url("item-images/{$app->image_file_name}") }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">
            <a class="btn btn-success" href="{{ route('app', ['app' => $app]) }}">{{ $app->title }}</a>
          </h5>
          <p style="margin-left: 10px;">作成者：<a href="#">{{ $app->user->name }}</a></p>
          <p style="margin-left: 10px;">言語：{{ $app->language }}</p>
          <p style="margin-left: 10px;">フレームワーク：{{ $app->framework }}</p>
          <p style="margin-left: 10px;">{!! nl2br(e($app->description)) !!}</p>
          <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
              <item-like :initial-is-liked-by='@json($app->isLikedBy(Auth::user()))' :initial-count-likes='@json($app->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('apps.like', ['app' => $app]) }}">
              </item-like>
            </div>
          </div>
          <a class="btn btn-primary" href="{{ $app->url }}">使用する</a>
          @if( Auth::id() === $app->user_id )
          @include('share.share_app_index')
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

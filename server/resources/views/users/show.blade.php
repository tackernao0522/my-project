@extends('layouts.app')

@section('title')
{{ $user->name }}さんの自己紹介
@endsection

@section('content')
<div class="container-sm">
  <div class="text-center mt-5">
    <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $user->name }}さんの自己紹介</span>
  </div>
  <div class="row">
    <div class="card-group mt-4 mb-3 mx-auto">
      <div class="card" style="width: 18rem">
        <div class="card-body">
          <p style="margin-left: 10px;">
            @if (!empty($user->avatar_file_name))
            <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
            @else
            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
            @endif
            {{ $user->name }}
          </p>
          <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
              <a href="" class="text-muted">
                10フォロー
              </a>
              <a href="" class="text-muted">
                10フォロワー
              </a>
            </div>
          </div>
          <div style="width: 70px; margin-left: 10px; margin-top: 10px; color:crimson; border-style: ridge;">自己紹介</div>
          <p style="margin-left: 10px;">{!! nl2br(e($user->body)) !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

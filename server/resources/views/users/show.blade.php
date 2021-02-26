@extends('layouts.app')

@section('title')
{{ $user->name }}さんのページ
@endsection

@section('content')
<div class="text-center mt-4">
  <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $user->name }}さんのページ</span>
</div>
<div class="container">
  <div class="col col-md-4">
    <div class="row">
      <div class="card-group mt-4 mb-3 mx-auto">
        <div class="card" style="width: 18rem">
          <div class="card-body">
            <p style="margin-left: 14px;">
              @if (!empty($user->avatar_file_name))
              <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
              @else
              <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
              @endif
              {{ $user->name }}
            </p>
            @if (Auth::id() !== $user->id)
              <follow-button
               class="mb-2"
               style="margin-left: 10px;"
               :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
               :authorized='@json(Auth::check())'
               endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
              >
              </follow-button>
            @endif
            <div class="card-body pt-0 pb-2 pl-3">
              <div class="card-text">
                <a href="" class="text-muted">
                  {{ $user->count_followings }} フォロー
                </a>
                <a href="" class="text-muted">
                  {{ $user->count_followers }} フォロワー
                </a>
              </div>
            </div>
            <div style="width: 70px; margin-left: 10px; margin-top: 10px; margin-bottom: 5px; color:crimson; border-style: ridge;">自己紹介</div>
            <p style="margin-left: 10px;">{!! nl2br(e($user->body)) !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

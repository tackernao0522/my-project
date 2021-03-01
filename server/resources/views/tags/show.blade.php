@extends('layouts.app')

@section('title')
{{ $tag->hashtag }}
@endsection

@section('content')
<div class="container-sm">
  <div class="text-center mt-4">
    <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $tag->hashtag }}</span>
  </div>
  <div class="container mb-4">
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="h4 card-title m-0">{{ $tag->hashtag  }}</h2>
        <div class="card-text text-right">
          {{ $tag->postApps->count() }}件
        </div>
      </div>
    </div>
  </div>
  <div class="container mb-4">
    @foreach($tag->postApps as $postApp)
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <a href="{{ route('users.show', [$postApp->user->name]) }}" class="text-dark">
          @if (!empty($postApp->user->avatar_file_name))
          <img src="{{ Storage::disk('s3')->url("avatars/{$postApp->user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
          @else
          <i class="fas fa-user-circle fa-3x"></i>
          @endif
        </a>
        @include('share.info_02')

        @include('share.modal')
      </div>
      @include('share.info')

    </div>

    @endforeach
  </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
{{ $user->name }}さんのページ
@endsection

@section('content')
<div class="text-center mt-4">
  <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $user->name }}さんのページ</span>
</div>
<div class="container mb-4">
  <div class="card mt-3">
    <div class="card-body">
      <div class="d-flex flex-row">
        @if (!empty($user->avatar_file_name))
        <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
        @else
        <i class="fas fa-user-circle fa-3x"></i>
        @endif
        @if (Auth::id() !== $user->id)
        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
        </follow-button>
        @endif
      </div>
      <h2 class="h5 card-title m-0" style="margin-top: 5px !important;">
        {{ $user->name }}
      </h2>
    </div>
    <div class="card-body">
      <div class="card-text">
        <a href="" class="text-muted">
          {{ $user->count_followings }} フォロー
        </a>
        <a href="" class="text-muted">
          {{ $user->count_followers }} フォロワー
        </a>
        <div style="width: 70px; margin-top: 10px; margin-bottom: 5px; color:crimson; border-style: ridge; text-align: center;">自己紹介</div>
        <p>{!! nl2br(e($user->body)) !!}</p>
      </div>
    </div>
  </div>
  <ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
      <a class="nav-link text-muted active" href="{{ route('users.show', ['name' => $user->name]) }}">
        アプリ
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-muted" href="">
        いいね
      </a>
    </li>
  </ul>
  @foreach($postApps as $postApp)
  <div class="card mt-3">
    <div class="card-body d-flex flex-row">
      @if (!empty($user->avatar_file_name))
      <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 54px; height: 54px;">
      @else
      <i class="fas fa-user-circle fa-3x"></i>
      @endif
      <div style="margin-left: 5px;">
        <div class="font-weight-bold">
          {{ $postApp->user->name }}
        </div>
        <div class="font-weight-lighter">
          {{ $postApp->created_at->format('Y/m/d H:i') }}
        </div>
      </div>

      @if ( Auth::id() == $postApp->user_id )
      <!-- Dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button type="button" class="btn btn-link text-muted m-0 p-2">
              <i class="fas fa-ellipsis-v"></i>
            </button>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('app.edit', [$postApp->id]) }}">
              <i class="fas fa-pen mr-1"></i>詳細を更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $postApp->id }}">
              <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
            </a>
          </div>
        </div>
      </div>
      <!-- Dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $postApp->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('apps.destroy', [$postApp->id]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{ $postApp->title }}を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endif
    </div>
    <div class="card-body pt-0 pb-2">
      <a href="{{ route('app', [$postApp->id]) }}">
        <img src="{{ Storage::disk('s3')->url("item-images/{$postApp->image_file_name}") }}" class="card-img-top" style="object-fit: cover; width: 153px; height: 153px;">
      </a>
      <h3 class="h4 card-title mt-2" style="margin-left: -4px; color:crimson;">
        {{ $postApp->title }}
      </h3>
      <div class="card-text" style="font-size: 15px; margin-left: -4px;">
        {!! nl2br(e( $postApp->description )) !!}
      </div>
      <div style="margin-left: -10px;">
        <a class="btn btn-primary" href="{{ $postApp->url }}">使用する</a>
      </div>
    </div>

  </div>
  @endforeach
</div>
@endsection

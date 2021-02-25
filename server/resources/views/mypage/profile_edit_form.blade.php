@extends('layouts.app')

@section('title')
プロフィール編集
@endsection

@section('content')
<div class="container">

  @include('share.flash')

  <div class="row">
    <div class="col">

      <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィールの編集</div>

      <form method="POST" action="{{ route('mypage.edit-profile') }}" class="p-5" enctype="multipart/form-data">
        @csrf

        {{-- アバター画像 --}}
        <div>プロフィール画像</div>
        <span class="avatar-form image-picker">
          <input type="file" name="avatar" class="d-none" accept="image/png, image/jpeg, image/gif" id="avatar">
          <label for="avatar" class="d-inline-block" role="button">
            @if (!empty($user->avatar_file_name))
            <img src="{{ Storage::disk('s3')->url("avatars/{$user->avatar_file_name}") }}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
            @else
            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
            @endif
          </label>
        </span>
        @error('item-image')
        <div style="color: #E4342E;" role="alert">
          <strong>{{ $message }}</strong>
        </div>
        @enderror

        {{-- ニックネーム --}}
        <div class="form-group mt-3">
          <label for="name">ニックネーム</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- 自己紹介 --}}
        <div class="form-group mt-3">
          <label for="body">自己紹介</label>
          <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body" autofocus>{{ old('body', $user->body) }}</textarea>
          @error('body')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group mb-0 mt-3">
          <button type="submit" class="btn btn-block btn-secondary">
            保存
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

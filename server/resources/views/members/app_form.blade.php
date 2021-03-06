@extends('layouts.app')

@section('title')
アプリ投稿
@endsection

@section('content')
<div class="container">

  @include('share.flash')

  <div class="row">
    <div class="col">

      <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">アプリを投稿する</div>

      <form method="POST" action="{{ route('posts.app') }}" class="p-5" enctype="multipart/form-data">
        @csrf

        {{-- アプリ画像 --}}
        <div>アプリ画像</div>
        <span class="item-image-form image-picker">
          <input type="file" name="item-image" class="d-none" accept="image/png, image/jpeg, image/gif" id="item-image">
          <label for="item-image" class="d-inline-block" role="button">
            <img src="/images/item-image-default.png" style="object-fit: cover; width: 220px; height: 220px;">
          </label>
        </span>
        @error('item-image')
        <div style="color: #E4342E;" role="alert">
          <strong>{{ $message }}</strong>
        </div>
        @enderror

        {{-- アプリ名 --}}
        <div class="form-group mt-3">
          <label for="title">アプリ名</label>
          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- タグ --}}
        <div class="form-group mt-3">
        <label>タグ</label>
          <post-app-tags-input
            :initial-tags='@json($tagNames ?? [])'
            :autocomplete-items='@json($allTagNames ?? [])'
          >
          </post-app-tags-input>
        </div>

        {{-- 言語 --}}
        <div class="form-group mt-3">
          <label for="language">言語</label>
          <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" required autocomplete="language" autofocus>
          @error('language')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- フレームワーク --}}
        <div class="form-group mt-3">
          <label for="framework">フレームワーク</label>
          <input id="framework" type="text" class="form-control @error('framework') is-invalid @enderror" name="framework" value="{{ old('framework') }}" autocomplete="framework" autofocus>
          @error('framework')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- アプリの説明 --}}
        <div class="form-group mt-3">
          <label for="description">アプリの説明</label>
          <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        {{-- アプリのURL --}}
        <div class="form-group mt-3">
          <label for="url">アプリのURL</label>
          <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>
          @error('url')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group mb-0 mt-3">
          <button type="submit" class="btn btn-block btn-primary">
            投稿する
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

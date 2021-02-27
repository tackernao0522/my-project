@extends('layouts.app')

@section('title')
{{ $user->name }}さんのページ
@endsection

@section('content')
<div class="text-center mt-4">
  <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $user->name }}さんのページ</span>
</div>
<div class="container mb-4">
  @include('users.user')
  @include('users.tabs', ['hasPostApps' => true, 'hasLikes' => false])
  @foreach($postApps as $postApp)
  @include('apps.card')
  @endforeach
</div>
@endsection

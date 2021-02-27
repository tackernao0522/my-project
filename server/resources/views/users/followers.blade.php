@extends('layouts.app')

@section('title')
{{ $user->name }}さんのフォロワー
@endsection

@section('content')
<div class="text-center mt-4">
  <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $user->name }}さんのフォロワー</span>
</div>
<div class="container mb-4">
  @include('users.user')
  @include('users.tabs', ['hasPostApps' => false, 'hasLikes' => false])
  @foreach($followers as $person)
  @include('users.person')
  @endforeach
</div>
@endsection

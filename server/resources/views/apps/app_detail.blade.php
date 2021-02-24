@extends('layouts.app')

@section('title')
  {{ $app->title }} | アプリケーション詳細
@endsection

@section('content')
<div class="container-sm">
    @include('share.flash')
    @if(Auth::check())
    <div class="text-center">
        <span style="height: 100px; font-size: 20px; color: red !important; border-style: ridge; padding: 5px;">{{ $app->user->name }}さんの{{ $app->title }}</span>
    </div>
    @endif
    <div class="row">
        @include('share.share_app_details')
        @if( Auth::id() === $app->user_id )
        @include('share.share_app_index')
        @endif
    </div>
</div>
</div>
</div>
</div>
@endsection

@extends('layouts.app')

@section('title')
アプリ一覧
@endsection

@section('content')
<div class="container-sm">
    @include('share.flash')
    <div class="row">
        @foreach($apps as $app)
        @include('share.share_app_details')
        @if( Auth::id() === $app->user_id )
        @include('share.share_app_index')
        @endif
    </div>
</div>
</div>
@endforeach
</div>
</div>
@endsection

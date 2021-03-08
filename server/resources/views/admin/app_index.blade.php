@extends('layouts.app')

@section('title')
管理者用アプリ一覧
@endsection

@section('content')
<div class="container-sm">
    @include('share.flash')
    @if(Auth::check())
    <div class="text-center">
        <a class="btn btn-dark" href="{{ route('posts.app') }}">アプリ投稿</a>
    </div>
    @endif
    <div class="row">
        @foreach($apps as $app)
        @include('share.share_app_details')
        @include('share/share_app_index')
    </div>
</div>
</div>
@endforeach
</div>
</div>
<div class="d-flex justify-content-center mt-3">
    {{ $apps->withQueryString()->links() }}
</div>
@endsection

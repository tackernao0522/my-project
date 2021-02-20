@extends('layouts.todo_content')

@section('title')
TodoTop
@endsection

@section('content')
<div class="container">

    @include('share.flash')

    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">
                    まずはフォルダを作成しましょう
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <a href="{{ route('folders.create') }}" class="btn btn-primary">
                            フォルダ作成ページへ
                        </a>
                        <div style="margin-top: 1rem !important;">
                            <a class="btn btn-danger" href="/">キャンセル</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection

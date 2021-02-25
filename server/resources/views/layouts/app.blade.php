<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/tp.ico">
</head>

<body>
    <main id="item">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="/">アプリ一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                <a href="{{ route('mypage.edit-profile') }}"><span class="btn btn-outline-light my-2 my-sm-0" style="margin-left: -1px; font-size: 12px; color: #fff !important;">ようこそ、 {{ Auth::user()->name }}さん</span></a>
                <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0 ml-auto" id="logout-form">
                    @csrf
                    <a href="#" id="logout" class="form-control mr-sm-2" style="width: 110px; display: block; text-align: center;">ログアウト</a>
                </form>
                @if( Auth::check() && Auth::user()->role === 'admin' )
                <a class="my-navbar-item pl-1 mr-sm-2 btn btn-dark" href="{{ route('admin.index') }}" style="margin-left: -1px; width: 85px; color: #fff; display: block; padding-left: 7px !important;">管理者用</a>
                @endif
                @else
                <a class="my-navbar-item ml-auto" href="{{ route('login') }}" style="color: #000044">ログイン</a>
                ｜
                <a class="my-navbar-item pr-1" href="{{ route('register') }}" style="color: #000044">会員登録</a>
                @endif
            </div>
        </nav>
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
    @endif
</body>

</html>

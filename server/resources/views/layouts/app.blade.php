<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/tp.ico">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="/">アプリ一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                <span class="btn btn-outline-light my-2 my-sm-0">ようこそ、 {{ Auth::user()->name }}さん</span>
                <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0 ml-auto" id="logout-form">
                    @csrf
                    <a href="#" id="logout" class="form-control mr-sm-2" style="width: 110px; display: block; text-align: center;">ログアウト</a>
                </form>
                @if( Auth::check() && Auth::user()->role === 'admin' )
                <a class="my-navbar-item pl-1 mr-sm-2 btn btn-dark" href="{{ route('admin.index') }}" style=" width: 85px; color: #fff; display: block; text-align: center;">管理者用</a>
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

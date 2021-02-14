<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title') | {{ config('app.name', 'Laravel') }}
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/tp.ico">
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
                <span class="btn btn-outline-light my-2 my-sm-0 ml-auto">ようこそ、 {{ Auth::user()->name }}さん</span>
                <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0 ml-auto" id="logout-form">
                    @csrf
                    <a href="#" id="logout" class="form-control mr-sm-2">ログアウト</a>
                </form>
                @else
                <a class="my-navbar-item ml-auto" href="{{ route('login') }}" style="color: #000044">ログイン</a>
                ｜
                <a class="my-navbar-item" href="{{ route('register') }}" style="color: #000044">会員登録</a>
                @endif
            </div>
        </nav>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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

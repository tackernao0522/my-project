<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

  <!-- Font Icon -->
  <link href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/todo.css') }}" rel="stylesheet">
  @yield('styles')

  <link rel="shortcut icon" href="/images/tp.ico">
</head>

<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" style="padding-left: 4rem;" href="/">アプリ一覧へ</a>
      <div class="my-navbar-control">
        <div class="dropdown" style="padding-right: 4rem;">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            MENU
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 6rem; margin-top: 1rem;">

            @if(Auth::check())
            <a href="{{ route('todo') }}" class="dropdown-item" style='color: #fff; display: block; text-align: center; padding-top: 1rem;'>ようこそ、{{ Auth::user()->name }}さん</a>
            <a href="#" id="logout" class="dropdown-item" style="margin: 0 auto; padding-left: 1.5rem; display: block; padding-top: 0.5rem;">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @endif
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>
</body>
@if(Auth::check())
<script>
  document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('logout-form').submit();
  });
</script>
@endif
@yield('scripts')

</html>

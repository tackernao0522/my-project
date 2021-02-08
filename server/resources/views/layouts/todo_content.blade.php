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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

  <link rel="shortcut icon" href="/images/tp.ico">
</head>

<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/folders/1/tasks">ToDo App</a>
    </nav>
  </header>
  <main>
    @yield('content')
  </main>
</body>
  @yield('scripts')
</html>

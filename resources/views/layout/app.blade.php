<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    @yield('styles')
</head>
<body>
<header>
    <div class="logo">e-Petycje</div>
    <form action="/search" method="GET">
        <input type="text" name="phrase" id="phrase" placeholder="Szukaj" value="{{$searchPhrase ?? ''}}">
        <button type="submit">
            <span class="material-icons">search</span>
        </button>
    </form>
    <div class="links">
        <a href="/login">Logowanie</a>
        <a href="/register">Rejestracja</a>
    </div>
</header>
<div class="content">
    @yield('content')
</div>

@yield('scripts')
</body>
</html>

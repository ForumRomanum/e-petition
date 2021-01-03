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
    <script src="{{ url('js/app.js') }}"></script>

    @yield('styles')
</head>
<body>

<header>
    <div class="logo"><a href="{{route('main-page')}}">e-Petycje</a></div>

    <form action="{{route('petitions')}}" method="GET" class="{{($searchPhrase ?? '') ? 'show' : ''}}">
        <input type="text" name="phrase" id="phrase"
               placeholder="Szukaj" value="{{$searchPhrase ?? ''}}">
        <button type="submit">
            <span class="material-icons">search</span>
        </button>
    </form>

    <div class="links">
        <div class="toggle-form"><span class="material-icons">search</span></div>
        @guest
            <a href="{{route('login')}}">Logowanie</a>
            <a href="{{route('register')}}">Rejestracja</a>
        @endguest
        @auth
            <a href="{{route('create-petition')}}">Dodaj petycję</a>
            <a href="{{route('logout')}}">Wyloguj</a>
        @endauth
    </div>
</header>

<div class="content">
    @yield('content')
</div>

<footer>
    <div class="footer-links">
        <a href="{{route('login')}}">Zaloguj się</a>
        <a href="{{route('register')}}">Zarejestruj się</a>
        <a href="{{route('petitions')}}">Petycje</a>
    </div>
</footer>

<script src="{{ url('js/header.js') }}"></script>
@yield('scripts')
</body>
</html>

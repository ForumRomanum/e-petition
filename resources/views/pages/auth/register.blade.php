@extends('layout.app')
@section('title', 'This is Post Page')


@section('styles')
    <link rel="stylesheet" href="{{ url('css/login-register.css') }}">
@endsection

@section('content')
    <form action="/register" class="form" method="post">
        @csrf

        <h1>Rejestracja</h1>
        <div class="fields">

            <label>
                Email:
                <input type="email" name="email" value="{{$oldLogin ?? ''}}" required>
            </label>
            <label>
                Hasło:
                <input type="password" name="password" value="{{$oldPassword ?? ''}}" required>
            </label>
            <label>
                Powtórz hasło:
                <input type="password" name="password-confirm" required>
            </label>

            <button type="submit">Zarejetruj się</button>

        </div>
    </form>
@endsection

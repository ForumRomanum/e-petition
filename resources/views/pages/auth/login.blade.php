@extends('layout.app')
@section('title', 'This is Post Page')


@section('styles')
    <link rel="stylesheet" href="{{ url('css/login-register.css') }}">
@endsection

@section('content')
    <form action="/login" class="form" method="post">
        @csrf

        <h1>Logowanie</h1>
        <div class="fields">

            <label>
                Email:
                <input type="email" name="email" value="{{$oldLogin ?? ''}}" required>
            </label>
            <label>
                Hasło:
                <input type="password" name="password" value="{{$oldPassword ?? ''}}" required>
            </label>

            <button type="submit">Zaloguj się</button>

        </div>
    </form>
@endsection

@extends('layout.app')
@section('title', 'This is Post Page')


@section('styles')
    <link rel="stylesheet" href="{{ url('css/login-register.css') }}">
@endsection

@section('content')
    <form class="form" method="post">
        @csrf

        <h1>Logowanie</h1>
        <div class="fields">

            <label>
                <span class="label">Email:</span>
                <input type="email" name="email" value="{{$oldLogin ?? ''}}" required>
            </label>
            <label>
                <span class="label">Hasło:</span>
                <input type="password" name="password" value="{{$oldPassword ?? ''}}" required>
            </label>

            <button type="submit">Zaloguj się</button>

        </div>
    </form>
@endsection

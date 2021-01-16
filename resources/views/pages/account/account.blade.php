@extends('layout.app')
@section('title', __('account.title'))


@section('content')
    <h1>@lang('account.title')</h1>

    <div class="wrapper">
        @include('pages.account.sidebar')

        <div class="account">
            <form method="post">
                @csrf
                <?php
                $user = auth()->user();
                ?>
                <label>
                    <span class="label">Imię</span>
                    <input type="text" name="first_name"  placeholder="Imię"
                           value="{{ old('first_name', $user->first_name) }}">
                </label>
                <label>
                    <span class="label">Nazwisko</span>
                    <input type="text" name="last_name" required placeholder="Nazwisko"
                           value="{{ old('last_name', $user->last_name) }}">
                </label>
                <label>
                    <span class="label">Email</span>
                    <input type="email" name="email" required placeholder="Email"
                           value="{{ old('email', $user->email) }}">
                </label>
                <button type="submit">@lang('common.save')</button>
            </form>
        </div>
    </div>

@endsection

@section('styles')
    <style>
        .wrapper {
            display: flex;
            flex-direction: row;
        }

        .account {
            width: calc(100% - 200px);
            padding-left: 20px;
        }
    </style>
@endsection

@section('scripts')
@endsection

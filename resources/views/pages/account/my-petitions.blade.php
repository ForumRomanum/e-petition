@extends('layout.app')
@section('title', __('account.title'))


@section('content')
    <h1>@lang('account.title')</h1>

    <div class="wrapper">
        @include('pages.account.sidebar')

        <div class="account">
            <h2>@lang('account.my-petitions')</h2>
            @include('layout.petitions-list', ['petitions' => $results])
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

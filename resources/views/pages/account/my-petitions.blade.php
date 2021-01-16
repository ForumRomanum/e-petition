@extends('layout.app')
@section('title', __('account.title'))


@section('content')
    <h1>@lang('account.title')</h1>

    <div class="wrapper">
        @include('pages.account.sidebar')

        <div class="account">
            @if(!$isWorkingCopy)
                <h2>@lang('account.my-petitions')</h2>
                @include('pages.account.user-petitions-list', ['petitions' => $results])
            @else
                <h2>@lang('account.my-working-copies')</h2>
                @include('pages.account.user-working-copies-petitions-list', ['petitions' => $results])
            @endif
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

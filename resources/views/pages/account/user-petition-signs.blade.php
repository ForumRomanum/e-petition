@extends('layout.app')
@section('title', __('account.title'))


@section('content')
    <h1>@lang('account.title')</h1>

    <div class="wrapper">
        @include('pages.account.sidebar')

        <div class="account">
            <div>
                <h2>{{ $petition->name }}</h2>
            </div>
            <div>
                {{$petition->formatted_signs_count}} @lang('petition.signs')
            </div>
            <a href="{{ route('get-petition-in-pdf', ['id' => $petition->id]) }}">
                PDF
            </a>
            <div class="results">
                @foreach($petition->signs as $sign)
                    <div class="item">
                        {{$sign->full_name}} {{$sign->email}}
                    </div>
                @endforeach
            </div>
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

        .results {
            margin-top: 30px;
        }

        .results .item {
            padding: 15px;
            border: 1px solid #dedede;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 10px;
        }
    </style>
@endsection


@extends('layout.app')
@section('title', 'Szukaj "' . e($searchPhrase) . '"')


@section('content')
    <h1>Szukaj "{{$searchPhrase}}"</h1>
    <div class="results">
    @foreach($results as $result)
    <div class="item">
        <div class="title">
            {{$result->name}}
        </div>
        <div class="description">
            {{$result->description_short}}
        </div>
        <div class="signs">
            {{$result->signs_count}}/{{$result->goal}}
        </div>
    </div>
    @endforeach
    </div>
    <style>
        .results{
            margin-top: 30px;
        }
        .results .item{
            margin-bottom: 10px;

        }
        .results .item .title{
            font-weight: bold;

        }
    </style>
@endsection

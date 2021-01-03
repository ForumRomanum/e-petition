@extends('layout.app')
@section('title', 'Petycje"' . $searchPhrase ? ' - Szukaj: "' . ($searchPhrase) . '"' : '')


@section('content')
    @if($searchPhrase)
        <h1>Szukaj "{{$searchPhrase}}"</h1>
        <p>
            Znaleziono {{$results->total()}}
        </p>
    @endif
    @include('layout.petitions-list', ['petitions' => $results])
@endsection

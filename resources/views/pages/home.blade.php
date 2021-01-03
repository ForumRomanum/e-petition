@extends('layout.app')
@section('title', 'This is Post Page')


@section('content')
    <div class="create">
        <a href="{{route('create-petition')}}">Stwórz petycję</a>
    </div>

    <h2>Najnowsze petycje</h2>
    @include('layout.petitions-list', ['petitions' => $lastPetitions])
@endsection

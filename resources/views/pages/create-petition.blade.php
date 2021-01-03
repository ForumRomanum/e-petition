@extends('layout.app')
@section('title', 'Stwórz petycję')


@section('content')
    <h1>Stwórz petycję</h1>
    <form method="post">
        <div class="petition-type">

        </div>
        <label>
            <span class="label">Tytuł petycji:</span>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <textarea name="description" id="description" hidden></textarea>

        <div class="centered">
            <div class="row">
                <div class="document-editor__toolbar"></div>
            </div>
            <div class="row row-editor">
                <div class="editor">{{old('description', '')}}</div>
            </div>
        </div>
    </form>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/ckeditor.css') }}">
@endsection

@section('scripts')
    <script src="{{ url('js/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ url('js/create-petition.js') }}"></script>
@endsection

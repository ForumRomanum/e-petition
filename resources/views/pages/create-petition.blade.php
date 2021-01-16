@extends('layout.app')
@section('title', 'Stwórz petycję')


@section('content')
    <h1>Stwórz petycję</h1>
    <form method="post">
        @csrf
        <div class="petition-type">
            <label class="radio">
                <input type="radio" name="type" value="{{\App\Models\Petition::PETITION_TO_MINISTRY}}" checked>
                <span class="label">@lang('petition.to_ministry')</span>
            </label>
            <label class="radio">
                <input type="radio" name="type" value="{{\App\Models\Petition::PETITION_TO_PUBLIC_PERSON}}">
                <span class="label">@lang('petition.to_public_person')</span>
            </label>
        </div>
        <label>
            <span class="label">@lang('petition.title'):</span>
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

        <div class="petition-public">
            <label class="radio">
                <input type="radio" name="is_public" value="1" checked>
                <span class="label">@lang('petition.publish')</span>
            </label>
            <label class="radio">
                <input type="radio" name="is_public" value="0">
                <span class="label">@lang('petition.save_as_working_copy')</span>
            </label>
        </div>
        <p class="danger">@lang('petition.publish_info')</p>

        <div class="petition-tags">
{{--          do zrobienia tagi--}}
        </div>

        <button type="submit">@lang('common.save')</button>
    </form>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/ckeditor.css') }}">
    <link rel="stylesheet" href="{{ url('css/create-petition.css') }}">
@endsection

@section('scripts')
    <script src="{{ url('js/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ url('js/create-petition.js') }}"></script>
@endsection

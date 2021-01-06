@extends('layout.app')
@section('title', $petition->title)


@section('content')
    <div class="wrapper">
        <div class="petition">
            <div class="top">
                <div class="petition-type">
                    @lang(\App\Models\Petition::TYPES_NAMES[$petition->type])
                </div>
                <div class="petition-title">{{ $petition->name }}</div>
                <div class="created-by">@lang('petition.created_by') {{ $petition->user->full_name }}</div>
            </div>
            <div class="petition-description">{!! $petition->description !!}</div>
            <div class="petition-tags">
                @foreach($petition->tags as $tag)
                    <div class="tag">
                        <span class="material-icons">local_offer</span> {{ $tag->name }}
                    </div>
                @endforeach
            </div>
        </div>
        <aside class="sign-section-wrapper">
            <div class="sign-section">
                podpisz
            </div>
        </aside>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ url('css/single-petition.css') }}">
@endsection
@section('scripts')
    <script src="{{ url('js/single-petition.js') }}"></script>
@endsection

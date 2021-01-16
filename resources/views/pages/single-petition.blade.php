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
                <div class="sign-box">

                    @include('layout.sign-count', ['petition' => $petition, 'checkSigns' => true])

                    <form action="{{route('sign-petition', ['id' => $petition->id])}}" method="post">
                        @csrf
                        <div class="inputs">
                            <label>
                                <span class="label">Imię</span>
                                <input type="text" name="first_name" required placeholder="Imię">
                            </label>
                            <label>
                                <span class="label">Nazwisko</span>
                                <input type="text" name="last_name" required placeholder="Nazwisko">
                            </label>
                            <label>
                                <span class="label">Email</span>
                                <input type="email" name="email" required placeholder="Email">
                            </label>
                        </div>
                        <label class="inline checkbox">
                            <input type="checkbox" name="notify" value="1">
                            <span class="label">Informuj mnie o ważnych zdarzeniach związanych z petycją</span>
                        </label>
                        <button type="submit">Podpisz</button>
                    </form>
                </div>
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

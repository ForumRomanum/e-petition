@if ($errors->count())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    <style>
        ul.errors {
            color: red;
            padding-left: 25px;
        }
    </style>
@endif

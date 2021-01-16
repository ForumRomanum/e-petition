<!DOCTYPE html>
<html lang="pl">
<body>
<p>@lang(\App\Models\Petition::TYPES_NAMES[$petition->type])</p>
<h1>{{ $petition->name }}</h1>
<p>@lang('petition.created_by') {{ $petition->user->full_name }}</p>


<div>{!! $petition->description !!}</div>

<div>
    {{$petition->formatted_signs_count}} @lang('petition.signs')
</div>

</body>
</html>

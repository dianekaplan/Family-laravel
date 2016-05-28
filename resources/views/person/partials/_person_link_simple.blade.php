
{{--show image link: --}}
@include ('person.partials._person_link_image', ['person' => $person])

{{--then name link: --}}
<a href="{{ action('PeopleController@show', [$person->id]) }}">

    {{--Show the name (or nickname)--}}
    @if($person->nickname)
        {{ $person->nickname }} {{ $person->last }}
    @else
            {{ $person->first }} {{ $person->last }}
    @endif
</a>



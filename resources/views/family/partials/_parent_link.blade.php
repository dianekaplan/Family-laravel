
@if ($gender = 'female')

    @if ($family->no_kids_bool)
        Wife:
    @else
        Mother:
    @endif

@elseif($gender = 'male')

    @if ($family->no_kids_bool)
        Husband:
    @else
        Father:
    @endif

    @endif

    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{$person->first}} {{$person->last}}</a>
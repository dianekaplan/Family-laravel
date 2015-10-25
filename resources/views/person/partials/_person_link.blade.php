@if($person->face)
        <img src="/faces/{{  $person->face  }}"/>
    @else
        <img src="/faces/noimage.gif" border="0" height="50"/>
    @endif

@if($person->nickname)
    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->nickname }} {{ $person->last }}</a>
    @else
    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a>
    @endif
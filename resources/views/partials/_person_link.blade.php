@if($person->face)
        <img src="/faces/{{  $person->face  }}"/>
    @else
        <img src="/faces/noimage.gif" border="0" height="50"/>
    @endif
    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a>

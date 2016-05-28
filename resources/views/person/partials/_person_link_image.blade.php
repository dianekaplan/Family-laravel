
{{--Link to person's page: --}}
<a href="{{ action('PeopleController@show', [$person->id]) }}">

{{--Show the picture (or placeholder)--}}
    @if($person->face)
        <img src="/faces/{{  $person->face  }}" class="img-rounded"/>
    @else
        <img src="/faces/noimage.gif" border="0" height="50" class="img-rounded"/>
    @endif
</a>



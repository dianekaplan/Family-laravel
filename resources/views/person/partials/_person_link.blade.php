


@if($person->face)
        <img src="/faces/{{  $person->face  }}" class="img-rounded"/>






    @else
        <img src="/faces/noimage.gif" border="0" height="50" class="img-rounded"/>

        {{--<div class="zone">--}}
        {{--<img  data-src="/faces/noimage.gif" width="50" height="50" src="blank.gif" class="lazy">--}}
    {{--</div>--}}
    @endif

@if($person->nickname)
    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->nickname }} {{ $person->last }}</a>
    @else
    <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a>
    @endif

@if ( $person->direct_bool == true )
    *
@endif
@unless ($person->stories->isEmpty())
    <img  src="/icons/book.png" height="30"/>
    @endunless

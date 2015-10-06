@extends('default')

@section('content')
    <h3>Person Index</h3>

    @if (count($people))

        @foreach ($people as $person)

        <li>@if($person->face)
                <img src="/faces/{{  $person->face  }}"/>
            @else
                <img src="/faces/noimage.gif" border="0" height="50"/>
            @endif
            <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a>
        </li>

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}
        @endforeach
    @endif
<br/>


@stop
@extends('default')

@section('content')
    <h3>Person Results</h3>
(here we have a list of people filtered by something)
    @if (count($people))

        @foreach ($people as $person)
        <li><a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a></li>

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}
        @endforeach
    @endif
<br/>


@stop
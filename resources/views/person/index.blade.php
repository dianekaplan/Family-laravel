@extends('default')

@section('content')
    <h3>Person Index</h3>

    @if (count($people))

        @foreach ($people as $person)
        <li><a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a></li>

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}

        @endforeach
    @endif
<br/>
    {{--Here's what we have for the database url (passed in from PeopleController.php): {{ $url_results }}--}}


@stop
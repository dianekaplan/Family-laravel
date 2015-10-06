@extends('default')

@section('content')
    <h3>Person Index</h3>

    @if (count($people))

        @foreach ($people as $person)

        <li>@if($person->face)
                <img src="/resources/assets/images/faces/{{  $person->face  }}"/>,
                <img src="http://dk-family.herokuapp.com/resources/assets/images/faces/{{  $person->face  }}"/>

                {{--{{ Fbuilder::image ('$this->face', 'alt text') }}>--}}
                {{--{{ HTML::image ('/resources/assets/images/faces/{{ $person->face }}', 'face')}}>--}}
            @endif

            <a href="{{ action('PeopleController@show', [$person->id]) }}">{{ $person->first }} {{ $person->last }}</a>
        </li>

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}
        @endforeach
    @endif
<br/>


@stop
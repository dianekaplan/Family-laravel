@extends('default')

@section('content')
    <h3>User Index</h3>

    @if (count($users))

        @foreach ($users as $user)
        <li><a href="{{ action('UserController@show', [$user->id]) }}">{{ $user->email }}</a></li>

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}

        @endforeach
    @endif
<br/>


@stop
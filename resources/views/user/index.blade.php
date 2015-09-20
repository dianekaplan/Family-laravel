@extends('default')

@section('content')
    <h3>User Index</h3>

    @if (count($users))

        @foreach ($users as $user)
        <li><a href="{{ action('UserController@show', [$user->id]) }}">{{ $user->email }}</a></li>

        {{--@TODO: come back and try again when not tired- episode 14, 12:17--}}
        {{--<li><a href="{{ action('UpdateController@user_updates', [$user->id]) }}">see suggested updates</a></li>--}}

        {{--<li>{!! link_to_route('pages.person', $song->title, [$song->slug]) !!}</li>--}}

        @endforeach
    @endif
<br/>


@stop
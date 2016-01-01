@extends('default')

@section('content')
    <h3>User Info</h3> <br/>

    <h4>Past month's logins:</h4>
    @if (count($recent_visitors))

        @foreach ($recent_visitors as $user)
            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
                - last login: {{ $user->last_login }},
                last pestered: {{ $user->last_pestered }}

                <br/>

                @endforeach
                @endif

    <h4>Users by activity level:</h4>
    <br/>
    <h4>Users by branch access:</h4>
    <br/>
    <h4>Users by pestering recency:</h4>
    <br/>
    <h4>List of everyone:</h4>

    @if (count($users))

        @foreach ($users as $user)
            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
            - last login: {{ $user->last_login }},
            last pestered: {{ $user->last_pestered }}
                {{--(Keem access: {{ $user->keem_access }},--}}
                {{--Husband access: {{ $user->husband_access }},--}}
                {{--Kemler access: {{ $user->kemler_access }},--}}
                {{--Kaplan/Kobrin access: {{ $user->kaplan_access }})--}}
                <br/>

        @endforeach
    @endif
<br/>


@stop
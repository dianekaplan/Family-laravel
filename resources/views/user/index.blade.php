@extends('default')

@section('content')
    <h3>User Index</h3>

    @if (count($users))

        @foreach ($users as $user)
            <li><a href="{{ action('UserController@show', [$user]) }}">{{ $user->name}}</a>
            - last login: {{ $user->last_login }},
            last pestered: {{ $user->last_pestered }},  Keem access: {{ $user->keem_access }},
                Husband access: {{ $user->husband_access }},
                Kemler access: {{ $user->kemler_access }},
                Kaplan/Kobrin access: {{ $user->kaplan_access }},<br/>

        @endforeach
    @endif
<br/>


@stop
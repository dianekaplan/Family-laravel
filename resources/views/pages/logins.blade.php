@extends('default')

@section('content')
    <h3>User Logins </h3> <br/>

@foreach ($logins as $login)
    <li><a href="{{ action('UserController@show', [$login->user_id]) }}">{{ $login->user->name}}</a>:
    {{ $login->created_at}} ({{ $login->created_at->diffForHumans()}})
    @endforeach

@stop
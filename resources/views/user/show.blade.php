@extends('default')

@section('content')
    <h3>{{$user->email}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    Here's everything: {{$user}}

    <br/>
    <br/>


    {{--{!! link_to_route('person.index', 'Back') !!}--}}

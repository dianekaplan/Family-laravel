@extends('default')

@section('content')

    {{--@FIXME: figure out why user info doesn't come through despite being accessible on index page, and being the same as people pages--}}

    <h3>{{$user->email}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    Here's everything: {{$user}}

    <br/>
    <br/>


    {{--{!! link_to_route('person.index', 'Back') !!}--}}

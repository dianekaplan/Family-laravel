@extends('default')

@section('content')
    <h3>{{ $update->user_id }}</h3>
Requested by user: {{$update->requesting_user}}

    <br/>

    {{ $update->summary }} <br/> <br/>
    Here's everything: {{$update}}

    <br/>
    <br/>


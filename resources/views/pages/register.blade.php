@extends('app')

@section('content')

    <h3 align="center">
        Our Family Tree : request account
    </h3>

    {{--{!! Form::open(['url' => 'landing']) !!}--}}
    {!! Form::open(['url' => 'register']) !!}
    {{--{!! Form::open(array('action' => 'RegistrationController@create')) !!}--}}

    @include ('errors.list')
    @include ('pages.partials._registration_request', ['submitButtonText' => 'Send account request'])

    {!! Form::close() !!}

    <br/>

    Questions/issues?
    <a href="mailto:dianekaplan@gmail.com?Subject=Account%20request" target="_top">
        Email me</a>

    <br/><br/><br/>

    @include ('person.partials._people_list_simple')

@stop







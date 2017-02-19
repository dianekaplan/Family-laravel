@extends('default')

@section('content')
    <h3>Send an email</h3>

    {{--'method' => 'post' is implied by default--}}
    {!! Form::open(['url' => 'email_sender']) !!}


    @include ('errors.list')
    @include ('admin._mail_form', ['submitButtonText' => 'Send Email'])

    {!! Form::close() !!}

    <br/>

@stop
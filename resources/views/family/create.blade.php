@extends('default')

@section('content')
    <h3>Add a new family</h3>

    {!! Form::open(['url' => 'families']) !!}

    @include ('errors.list')
    @include ('family._form', ['submitButtonText' => 'Add Family'])

    {!! Form::close() !!}

    <br/>

@stop
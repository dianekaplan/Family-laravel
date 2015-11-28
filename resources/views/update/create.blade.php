@extends('default')

@section('content')
    <h3>Add a suggested update</h3>

    {!! Form::open(['url' => 'updates']) !!}
    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}

    @include ('errors.list')
    @include ('update._form', ['submitButtonText' => 'Add Update'])


    {!! Form::close() !!}

    <br/>

@stop
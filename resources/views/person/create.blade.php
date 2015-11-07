@extends('default')

@section('content')
    <h3>Add a new person</h3>

    {!! Form::open(['url' => 'people']) !!}
    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}

    @include ('errors.list')
    @include ('person.partials._form', ['submitButtonText' => 'Add Person'])

    {!! Form::close() !!}

    <br/>

@stop
@extends('default')

@section('content')
    <h3>Add a new user</h3>

    {!! Form::open(['url' => 'users']) !!}
    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}

    @include ('errors.list')
    @include ('user._form', ['submitButtonText' => 'Add User'])

    {!! Form::close() !!}

    <br/>

@stop
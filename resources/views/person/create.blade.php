@extends('default')

@section('content')
    <h3>Add a new person</h3>

    {!! Form::open() !!}
    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}
    @include ('person._form')

    {!! Form::close() !!}

    <br/>
    {{--Here's what we have for the database url (passed in from PeopleController.php): {{ $url_results }}--}}


@stop
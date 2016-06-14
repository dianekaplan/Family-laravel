@extends('default')

@section('content')
    <h3>Add a new image</h3>

    {{--This matches what I have for user and person create, but it goes to a white page at /images, without saving anything new--}}
    {{--user and people both have named routes for index, and the images one doesn't have a name--}}
    {{--{!! Form::open(['url' => 'images']) !!}--}}
    {!! Form::open(['url' => 'images', 'method' => 'POST']) !!}

    {{--{!! Form::open( ['route' => ['images.create']]) !!}--}}
    {{--{!! Form::model(  ['route' => ['images.create'], 'method' => 'PUT']) !!}--}}
    {{--Both of these to above got: methodNotAllowed(array('GET', 'HEAD', 'PUT', 'PATCH', 'DELETE')) in RouteCollection.php line 206--}}

    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}

    @include ('image/partials._image_form')
    @include ('partials._family_bools')


    {!! Form::submit('Add Image', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}


@stop
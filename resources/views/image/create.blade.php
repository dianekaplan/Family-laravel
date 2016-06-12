@extends('default')

@section('content')
    <h3>Add a new image</h3>

    {!! Form::open(['url' => 'images']) !!}
    {{--{!! Form::open( ['route' => ['person.store']]) !!}--}}

    @include ('image.partials._image_form', ['submitButtonText' => 'Add Image'])


    {!! Form::close() !!}

    <br/>

@stop
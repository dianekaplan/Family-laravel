@extends('default')


@section('content')
    <h2>Edit person:  {{$person_to_update->first}} {{$person_to_update->last}} </h2>


    {!! Form::model($person_to_update, ['route' => ['people.update', $person_to_update->id], 'method' => 'PATCH']) !!}

    @include ('errors.list')
    @include ('person.partials._admin_fields')
    @include ('person.partials._form', ['submitButtonText' => 'Update Person'])

    {!! Form::close() !!}


@stop
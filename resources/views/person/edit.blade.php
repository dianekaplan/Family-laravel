@extends('default')

{{--//FIXME: on this page the 'Laravel Family Tree' heading from the default.blade.php displays at the bottom,
fine on the index page--}}

@section('content')
    <h2>Edit:  {{$person->first}} {{$person->last}} </h2>


    {!! Form::model($person, ['route' => ['people.update', $person->id], 'method' => 'PATCH']) !!}
    {{--//alternative to using route is: 'action' => ['PeopleController@update', $person->id]]) --}}
    @include ('errors.list')
    @include ('person._form', ['submitButtonText' => 'Update Person'])

    {!! Form::close() !!}

    {{--{!! delete_form(['people.destroy', $person->id]) !!}--}}

@stop

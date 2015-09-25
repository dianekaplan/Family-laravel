@extends('default')

{{--//FIXME: on this page the 'Laravel Family Tree' heading from the default.blade.php displays at the bottom,
fine on the index page--}}

@section('content')
    <h2>Edit:  {{$update->summary}}  </h2>

    {!! Form::model($update, ['route' => ['updates.update', $update->id], 'method' => 'PATCH']) !!}
    {{--//alternative to using route is: 'action' => ['PeopleController@update', $person->id]]) --}}
    @include ('errors.list')
    @include ('update._form', ['submitButtonText' => 'Update the requested Update'])

    {!! Form::close() !!}

    {{--{!! delete_form(['people.destroy', $person->id]) !!}--}}

@stop

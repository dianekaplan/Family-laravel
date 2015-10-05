@extends('default')

{{--//FIXME: on this page the 'Laravel Family Tree' heading from the default.blade.php displays at the bottom,
fine on the index page--}}

@section('content')
    <h2>Edit:  {{$family->caption}}  </h2>


    {!! Form::model($family, ['route' => ['families.update', $family->id], 'method' => 'PATCH']) !!}

    @include ('errors.list')
    @include ('family._form', ['submitButtonText' => 'Update Family'])

    {!! Form::close() !!}


@stop

@extends('default')


@section('content')
    <h2>Edit family:  {{$family_to_update->caption}}  </h2>


    {!! Form::model($family_to_update, ['route' => ['families.update', $family_to_update->id], 'method' => 'PATCH']) !!}

    @include ('errors.list')
    @include ('family.partials._admin_fields')
    @include ('family._form', ['submitButtonText' => 'Update Family'])

    {!! Form::close() !!}


@stop
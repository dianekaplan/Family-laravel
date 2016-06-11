@extends('default')

{{--//FIXME: on this page the 'Laravel Family Tree' heading from the default.blade.php displays at the bottom,
fine on the index page--}}

@section('content')
    <h2>Edit:  {{$user->email}}  </h2>

    {{--{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'POST']) !!}--}}
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}
    {{--//alternative to using route is: 'action' => ['PeopleController@update', $person->id]]) --}}
    @include ('errors.list')
    @include ('user._form', ['submitButtonText' => 'Update User'])

    {!! Form::close() !!}

    {{--{!! delete_form(['people.destroy', $person->id]) !!}--}}

@stop

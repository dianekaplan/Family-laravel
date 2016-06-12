@extends('default')

{{--//FIXME: on this page the 'Laravel Family Tree' heading from the default.blade.php displays at the bottom,
fine on the index page--}}

@section('content')

    <h2>Edit:  {{$user->email}}  </h2>
    {{--Or <a href="{{ action('UserController@destroy', [$user]) }}" >Delete this user</a> (not working yet- we don't get there)--}}
    <br/><br/>

    {{--{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'POST']) !!}--}}


    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PATCH']) !!}

    {{--{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}--}}
    {{--//alternative to using route is: 'action' => ['PeopleController@update', $person->id]]) --}}
    @include ('errors.list')
    @include ('user._form', ['submitButtonText' => 'Update User'])

    {!! Form::close() !!}


@stop

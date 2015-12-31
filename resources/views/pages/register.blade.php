@extends('app')

@section('content')

    <h3 align="center">
        Our Family Tree : request account
    </h3>

    {{--{!! Form::open(['url' => 'landing']) !!}--}}
    {!! Form::open(['url' => 'register']) !!}
    {{--{!! Form::open(array('action' => 'RegistrationController@create')) !!}--}}

    @include ('errors.list')
    @include ('pages.partials._registration_request', ['submitButtonText' => 'Send account request'])


    {!! Form::close() !!}


    <br/><br/>

    @if (count($people))

        @foreach ($people as $person)
            <li class="jumble">
                @include ('person.partials._person_link_simple', ['person' => $person])

            </li>
        @endforeach

    @endif

@stop







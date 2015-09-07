@extends('default')

@section('content')
    <h3>{{$person->first}} {{$person->last}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    Here's everything: {{$person}}

    <br/>
    <br/>


    @if ($person->birthdate)
    Birthdate: {{  $person->birthdate }} <br/>
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            happy birthday, {{ $person->first }} !
        @endif
   @endif

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

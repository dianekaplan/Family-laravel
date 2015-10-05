@extends('default')

@section('content')
    <h3>{{$family->caption}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    Here's everything: {{$family}}

    <br/>
    <br/>


    @if ($family->marriage_date)
    Marriage date: {{  $family->marriage_date }} <br/>
        @if( $family->marriage_date->month == \Carbon\Carbon::now()->month)
            happy anniversary, {{ $family->caption }} !
        @endif
   @endif


    @stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

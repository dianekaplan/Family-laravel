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

    @unless ($person->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($person->tags as $tag)
                <li> {{ $tag->name  }}</li>
                @endforeach
        </ul>
    @endunless

    @stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

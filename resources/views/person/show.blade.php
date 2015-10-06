@extends('default')

@section('content')
    <h3>{{$person->first}} {{$person->last}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            happy birthday, {{ $person->first }}! <br/>
        @endif
    @endif


    Full Name: {{$person->first}} @if ($person->middle){{$person->middle}} @endif{{$person->last}}<br/>
    Birthdate: @if ($person->birthdate) {{  $person->birthdate->toDateString() }} @endif
    @if ($person->birthdate_note){{  $person->birthdate_note }} @endif  <br/>


    Born in: {{ $person->birthplace }}<br/>
    Grew up in family: <a href="{{ action('FamilyController@show', [$person->family_of_origin]) }}">{{ $person->family_of_origin }}</a><br/>
    National Origin:  {{  $person->origin }}  <br/>
    Education:   {{  $person->education }}  <br/>
    Work:  {{  $person->work }} <br/>
    Interests:   {{  $person->inerests }}  <br/>
    Current location:  {{  $person->current_location }}  <br/>

   @if ($person->deathdate)Death Date: {{$person->deathdate}} @endif
    @if ($person->deathdate_note)Death Date: {{$person->deathdate_note}} @endif
    <br/>





    <br/>
    Whole record: {{$person}}

    <br/>
    <br/>


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

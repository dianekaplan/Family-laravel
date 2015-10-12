@extends('default')

@section('content')
    <h3>{{$family->caption}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    Mother: <a href="{{ action('PeopleController@show', [$family->mother_id]) }}">{{$family->mother_id}}</a><br/>
    Father: <a href="{{ action('PeopleController@show', [$family->father_id]) }}">{{$family->father_id}}</a><br/>

    @if ($family->marriage_date)
        Marriage date: {{  $family->marriage_date }} <br/>

        {{--@FIXME- this is the part that makes the non-object error when I make a new record in the app (with date)--}}
        {{--@if( $family->marriage_date->month == \Carbon\Carbon::now()->month)--}}
            {{--happy anniversary, {{ $family->caption }} !--}}
        {{--@endif--}}

    @endif


    {{--Marriage Date: @if ($family->marriage_date) {{ $family->marriage_date->toDateString() }} @endif--}}
    @if ($family->marriage_date_note){{  $family->marriage_date_note }} @endif  <br/>

    @if ($family->notes1) Notes 1: {{  $family->notes1 }} @endif  <br/>
    @if ($family->notes2) Notes 2: {{  $family->notes2 }} @endif  <br/>

    @unless($family->no_kids_bool)
        Kids: (will add links)
    @endunless


    <br/>
    <br/>





    <br/>
    <br/>
    Here's everything: {{$family}}



@stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

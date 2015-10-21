@extends('default')

@section('content')
    <h3>{{$family->caption}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    {{--@FIXME: I can access the $mother and $father people contents, but none of their individual fields by name:
    undefined property, (neither here nor in the partial), though it DOES work for the kids--}}
    {{--{{$mother->first}}--}}
    {{--Mother: @include ('partials._person_link', ['person' => $mother])<br/>--}}
    {{--Mother: <a href="{{ action('PeopleController@show', [$mother->id]) }}">{{$mother->id}}</a><br/>--}}
    {{--Mother: <a href="{{ action('PeopleController@show', [$family->mother_id]) }}">{{$mother_name}}</a><br/>--}}

  Mother variable we passed in: {{$mother}} <br/><br/>

    @if ($family->no_kids_bool)
    Wife:  <a href="{{ action('PeopleController@show', [$family->mother_id]) }}">{{$family->mother_id}}</a><br/>
    Husband: <a href="{{ action('PeopleController@show', [$family->father_id]) }}">{{$family->father_id}}</a><br/>
    @else

    {{--Mother: <a href="{{ action('PeopleController@show', [$family->mother_id]) }}">{{$mother_name}}</a><br/>--}}
    Mother: <a href="{{ action('PeopleController@show', [$family->mother_id]) }}">{{$family->mother_id}}</a><br/>
    Father: <a href="{{ action('PeopleController@show', [$family->father_id]) }}">{{$family->father_id}}</a><br/>
    @endif

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
            Kids: <br/>

            @foreach($kids as $kid)
                @include ('partials._person_link', ['person' => $kid])<br/>
             @endforeach

    @endunless

    <br/>
    Images:
    @foreach($images as $image)
            @include ('partials._image_link', ['image' => $image])
    @endforeach

    <br/>
    <br/>





    <br/>
    <br/>
    Here's everything: {{$family}}



@stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

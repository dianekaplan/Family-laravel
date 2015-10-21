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

    {{--Grew up in family: @include ('partials._family_link', ['family' => $family_of_origin])--}}
    {{--@FIXME: exactly like issue in family show view, here I load _family_link partial and undefined property $id--}}
    Grew up in family:  <br/>
    <a href="{{ action('FamilyController@show', [$person->family_of_origin]) }}">{{ $origin_family->caption }}</a><br/>

    {{--That works, but when I try this I get an error:--}}
    {{--Grew up in family:--}}
    {{--@include ('partials._family_link', ['family' => $family_of_origin])--}}
    {{--"Trying to get property of non-object"--}}
    


    National Origin:  {{  $person->origin }}  <br/>


    @if ($featured_image)
            @foreach($featured_image as $image)
                    <img src="http://newribbon.com/family/images/{{ $image->std_name  }}">
            @endforeach
    @endif
    <br/>


    Education:   {{  $person->education }}  <br/>
    Work:  {{  $person->work }} <br/>
    Interests:   {{  $person->interests }}  <br/>
    Current location:  {{  $person->current_location }}  <br/>
     {{--{{  $made_family }}--}}

    @if ($made_family)
        <h5>Made family:</h5>
            @foreach($made_family as $family_made)
                <a href="{{ action('FamilyController@show', [$family_made->id]) }}">{{$family_made->caption}}</a><br/>

            @endforeach
    @endif

    <br/>

    @if ($person->deathdate)Death Date: {{$person->deathdate}} @endif
    @if ($person->deathdate_note)Death Date: {{$person->deathdate_note}} @endif
    <br/>


    <h5>Pictures of {{$person->first}}:</h5>

    @if ($solo_images)
        <h5>Solo images:</h5>
        <ul>
            @foreach($solo_images as $image)
                @include ('partials._image_link', ['image' => $image])
            @endforeach
        </ul>
    @endif


    @unless ($person->images->isEmpty())
        <h5>Group images:</h5>
            <div>
            @foreach($person->images as $image)
                    @include ('partials._image_link', ['image' => $image])
            @endforeach
            </div>
    @endunless

    @unless ($person->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($person->tags as $tag)
                <li> {{ $tag->name  }}</li>
                @endforeach
        </ul>
    @endunless

    <br/>
    Whole record: {{$person}}

    <br/>
    <br/>

    @stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

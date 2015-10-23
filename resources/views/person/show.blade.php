@extends('default')

@section('content')
    <h3>{{$person->first}} {{$person->last}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            happy birthday, {{ $person->first }}! <br/>
        @endif
    @endif



    <div class="bottom">
        <div style="float: left; width: 33%;">

        Full Name: {{$person->first}} @if ($person->middle){{$person->middle}} @endif{{$person->last}}<br/>
        Birthdate: @if ($person->birthdate) {{ date('F d, Y', strtotime($person->birthdate)) }} @endif
        @if ($person->birthdate_note){{  $person->birthdate_note }} @endif  <br/>

        Born in: {{ $person->birthplace }}<br/>


            @if ($origin_family)
        Grew up in family:
                @include ('family.partials._family_link', ['family' => $origin_family, 'generation' => 'NA'])
                @endif
            <br/>

         National Origin:  {{  $person->origin }}  <br/>
        </div>
        <div style="float: left; width: 33%;">


        @if ($featured_image)
                @foreach($featured_image as $image)
                        <img src="http://newribbon.com/family/images/{{ $image->std_name  }}">
                @endforeach
        @endif
        </div>
        <div style="float: left; width: 33%;">
        Education:   {{  $person->education }}  <br/>
        Work:  {{  $person->work }} <br/>
        Interests:   {{  $person->interests }}  <br/>
        Current location:  {{  $person->current_location }}  <br/>
            @if ($person->deathdate)Death Date: {{ date('F d, Y', strtotime($person->deathdate))}} @endif
            @if ($person->deathdate_note)Death Date: {{$person->deathdate_note}} @endif
            </div>

        @if ($made_family)
            <h5>Made family:</h5>
            @foreach($made_family as $family_made)
                @include ('family.partials._family_link', ['family' => $family_made, 'generation' => 'NA'])<br/>

            @endforeach
        @endif

        <div style="float: left; width: 100%;">

         {{--{{  $made_family }}--}}



    <br/>



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
</div>

    </div>


    <br/>
    Whole record: {{$person}}

    <br/>
    <br/>

    @stop

    {{--{!! link_to_route('person.index', 'Back') !!}--}}

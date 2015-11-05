@extends('default')

@section('content')

@if ($person->nickname)
    <h3>{{$person->nickname}} {{$person->last}}</h3>
    @else

    <h3>{{$person->first}} {{$person->last}}</h3>
    @endif

    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

{{--<div style="float: right; width: 33%;">--}}
    {{--@if ($person->birthdate)--}}
        {{--@if( $person->birthdate->month == \Carbon\Carbon::now()->month)--}}
            {{--Happy birthday, {{ $person->first }}!--}}
        {{--@endif--}}
    {{--@endif--}}
 {{--</div>--}}

    <div class="bottom">
        <div style="float: left; width: 33%;">

        <b>Born:</b>  {{$person->first}}
            @if ($person->middle){{$person->middle}} @endif
            @if ($person->maiden){{$person->maiden}} @else {{$person->last}} @endif <br/>

            <b>Birthdate:</b> @if ($person->birthdate) {{ date('F d, Y', strtotime($person->birthdate)) }} @endif
        @if ($person->birthdate_note){{  $person->birthdate_note }} @endif  <br/>

        <b>Born in:</b> {{ $person->birthplace }}<br/>

            @if ($origin_family)
                <img  src="/icons/up.gif"/>
       <b> Grew up in family:</b>
            {{--@TODO: replace old images with glyphicons: http://getbootstrap.com/components/--}}
                {{--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>--}}

                @include ('family.partials._family_link', ['family' => $origin_family, 'generation' => 'NA'])
                @endif
            <br/>

        <b> National Origin: </b> {{  $person->origin }}  <br/>
        </div>

        <div style="float: left; width: 33%;">
            @include ('partials._featured_image', ['featured_image' => $featured_image])
        </div>

        <div style="float: left; width: 33%;">
            <b> Education: </b>  {{  $person->education }}  <br/>
            <b> Work: </b> {{  $person->work }} <br/>
            <b> Interests: </b>  {{  $person->interests }}  <br/>
            <b> Current location: </b> {{  $person->current_location }}  <br/>
            @if ($person->deathdate)Death Date: {{ date('F d, Y', strtotime($person->deathdate))}} @endif
            @if ($person->deathdate_note)Death Date: {{$person->deathdate_note}} @endif
            </div>


        @if (count($made_family))
            <b>  Made family:</b>
            @foreach($made_family as $family_made)
                @include ('family.partials._family_link', ['family' => $family_made, 'generation' => 'NA'])
                @if ($family_made->no_kids_bool)
                    <img  src="/icons/sideways.gif"/>
                @else
                    <img  src="/icons/down.gif"/>
                @endif
                <br/>
            @endforeach
        @endif

        <div style="float: left; width: 100%;">
            @if( $notes )
                    @include ('partials._notes', ['notes' => $notes])
            @endif


            @include ('partials._stories', ['subject' => $person])


    @if ($solo_images)
        <h4>Pictures of @if($person->nickname){{$person->nickname}}@else{{$person->first}}@endif:</h4>

            @foreach($solo_images as $image)
                @include ('partials._image_link', ['image' => $image])
            @endforeach

    @endif
</div>


                <div style="float: left; width: 100%;">

    @unless ($person->images->isEmpty())
                        <h4>Group pictures:</h4>
            @foreach($person->images as $image)
                    @include ('partials._image_link', ['image' => $image])
            @endforeach

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


    {{--Whole record: {{$person}}--}}

    @stop


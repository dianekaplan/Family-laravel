@extends('default')

@section('content')

    <div style="float: left; width: 100%;">
@if ($person->nickname)
    <h3>{{$person->nickname}} {{$person->last}}</h3>
    @else

    <h3>{{$person->first}} {{$person->last}}</h3>
    @endif

    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}


    <h4>  <img src="/icons/pencil.png" height="25"/>
        {{--<a href = "/people/{{$person->id}}/edit">--}}
        <a href="{{ action('PeopleController@edit', [$person]) }}" >

@if ($logged_in_user->person_id == $person->id)
Update my info
@else
Update info for this person
@endif
    </a> </h4>
</div>


    <div class="bottom">
        <div style="float: left; width: 33%;">

        <b>Born:</b>  {{$person->first}}
            @if ($person->middle){{$person->middle}} @endif
            @if ($person->maiden){{$person->maiden}} @else {{$person->last}} @endif <br/>

            <b>Birthdate:</b> @if ($person->birthdate) {{ date('F d, Y', strtotime($person->birthdate)) }} @endif
        @if ($person->birthdate_note){{  $person->birthdate_note }} @endif  <br/>

        <b>Born in:</b> {{ $person->birthplace }}<br/>



            @if ($origin_family)
                {{--<img  src="/icons/up.gif"/>--}}
                <a href="{{ action('FamilyController@show', [$origin_family]) }}" >
                <img  src="/icons/northwest.png" height="25"/></a>
       <b> Grew up in family:</b>
            {{--@TODO: replace old images with glyphicons: http://getbootstrap.com/components/--}}
                {{--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>--}}

                @include ('family.partials._family_link', ['family' => $origin_family, 'generation' => 'NA'])
                @endif
            <br/>

        <b> National Origin: </b> {{  $person->origin }}  <br/>
        </div>

        <div style="float: left; width: 33%;">
            @if (count($featured_image))
                @foreach($featured_image as $image)
                    @include ('partials._featured_image', ['featured_image' => $featured_image])
                @endforeach
            @endif
        </div>



        <div style="float: left; width: 33%;">
            <b> Education: </b>  {{  $person->education }}  <br/>
            <b> Work: </b> {!!    $person->work !!}<br/>
            <b> Interests: </b>  {{  $person->interests }}  <br/>
            <b> Location: </b> {{  $person->current_location }}  <br/>
            @if ($person->deathdate)<b>Death Date: </b> {{ date('F d, Y', strtotime($person->deathdate))}}<br/> @endif
            @if ($person->deathdate_note)<b>Death Date: </b> {{$person->deathdate_note}} <br/>@endif

        @if (count($made_family))

            @foreach($made_family as $family_made)

                @if ($family_made->no_kids_bool)
                        <b> Married:</b>
                        @include ('family.partials._family_link', ['family' => $family_made, 'generation' => 'NA'])
                    {{--<img  src="/icons/sideways.gif"/>--}}
                        <img  src="/icons/right_arrow.svg" height="18"/>
                @else
                        <b> Raised family:</b>
                        @include ('family.partials._family_link', ['family' => $family_made, 'generation' => 'NA'])
                    {{--<img  src="/icons/down.gif"/>--}}
                        <img  src="/icons/southeast.png" height="25"/>
                @endif
                <br/>
            @endforeach
        @endif
        </div>


        <div style="float: left; width: 100%;">
            @if( $person->notes1 )  {!!   $person->notes1 !!} <br/> @endif
                @if( $person->notes2 ) {!!  $person->notes2 !!} <br/>@endif
                @if( $person->notes3 ){!!  $person->notes3 !!} <br/>@endif

            @include ('pages.add_note_link', ['user' => Auth::user(), 'type'=>'people', 'id' => $person->id, 'name'=>$person->first])<br/>



            @if( $notes )
                    @include ('partials._notes', ['notes' => $notes])
            @endif

            @include ('partials._stories', ['subject' => $person]) <br/>
            @include ('video.partials._person_videos', ['subject' => $person, 'class' => "img-rounded"])

        </div>

        <div style="float: left; width: 100%;">
                @if (count($solo_images))

        <h4>Pictures of @if($person->nickname){{$person->nickname}}@else{{$person->first}}@endif:</h4>

            @foreach($solo_images as $image)
                @include ('partials._image_link', ['image' => $image, 'class' => "img-rounded"])
            @endforeach
    @endif
</div>


                <div style="float: left; width: 100%;">

    @unless ($person->images->isEmpty())
                        <h4>Group pictures:</h4>
            @foreach($person->images as $image)
                    @include ('partials._image_link', ['image' => $image,  'class' => "img-rounded"])
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


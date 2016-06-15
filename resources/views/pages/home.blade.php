@extends('default')

@section('content')

<br/>Welcome, {{$user->name}}!<br/>
{{--<div style="float: right; width: 26%;">--}}
    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
             Happy birthday this month!
        @endif
    @endif

{{--</div>--}}


<div class="bottom">
    <div style="float: left; width: 23%;" id="family_section">

        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'Y'])
    <br/>
        <h3><a href="/history">My family history</a></h3>
        <h3><a href="/album">Family album</a></h3>
        <h3><a href="/videos">Home movies</a> </h3>
        <h3><a href="/outline">Outline View</a></h3>

        @if( isset($user->furthest_html))
            <br/>
        My furthest ancestors here: <br/>{!! $user->furthest_html!!}
        @endif
        <br/><br/>


      <a href="/account"> My additions to the family tree</a>
        </div>


        <div style="float: left; width: 30%;" id="family_section">

            {{--32% is where nov birthdays don't wrap--}}

            @if (count($birthday_people))
<b>Birthdays this month:</b>
                @foreach ($birthday_people as $birthday_person)
                    <li>
                        @include ('person.partials._person_link', ['person' => $birthday_person, 'show_flag'=>'N', 'show_book'=>'N'])
                        {{ date('M d, Y', strtotime($birthday_person->birthdate)) }}
                        {{--{{ date('m/j/Y', strtotime($birthday_person->birthdate)) }}--}}
                    </li>
                @endforeach
            @endif
            <br/>

            @if (count($anniversary_couples))
                <br/>
                <b>Anniversaries this month:</b>
                @foreach ($anniversary_couples as $anniversary_couple)
                    <li>
                        @include ('family.partials._family_link', ['family' => $anniversary_couple, 'generation'=>$anniversary_couple->branch_seq])
                        <br/> {{ date('M d, Y', strtotime($anniversary_couple->marriage_date)) }}
                        {{--{{ date('m/j/Y', strtotime($birthday_person->birthdate)) }}--}}
                    </li>
                @endforeach
            @endif
            <br/>
        </div>
</div>

<div class="bottom" >
    <div style="float: right; width: 41%;" id="family_section">

        @unless ($new_pictures->isEmpty())
            Latest pics:
            @foreach($new_pictures as $image)
                @include ('partials._image_link', ['image' => $image,  'class' => "img-rounded"])
            @endforeach
        @endunless
            {!! $new_pictures->render() !!}
        <br/>        

    </div>


    <div style="float: left; width: 41%;" id="family_section">

        @unless ($new_videos->isEmpty())
            Latest videos:
            @foreach($new_videos as $video)
                @include ('video.partials._video_link', ['video' => $video, 'class'=> "img-rounded"])
            @endforeach
        @endunless
        {!! $new_videos->render() !!}

    </div>

    <div style="float: right; width: 41%;" id="family_section">

        Latest updates:
        <ul class="list-group">
            @include ('activity.partials._list', [ 'hide_types' => [] ])
        </ul>


    </div>


</div>
@stop


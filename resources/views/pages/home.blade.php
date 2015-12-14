@extends('default')

@section('content')

<br/>Welcome, {{$user->name}}! <br/><br/>
<div style="float: right; width: 26%;">
    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            Happy birthday!
        @endif
    @endif
</div>

<div class="bottom">
    <div style="float: left; width: 23%;" id="family_section">


    Me:   <br/>
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'Y'])
<br/>
        <h3><a href="/history">My family history</a></h3>
        <h3><a href="/album">My family album</a></h3><br/>

        My furthest ancestors here: <br/>{!! $user->furthest_html!!}<br/><br/>
        <a href="/outline">Chronological Outline</a><br/><br/>
      <a href="/account"> My additions to the family tree</a> <br/>
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

</div>

    <div style="float: left; width: 41%;" id="family_section">

        @unless ($new_pictures->isEmpty())
            Recent pics added:
            @foreach($new_pictures as $image)
                @include ('partials._image_link', ['image' => $image])
            @endforeach
        @endunless
            {!! $new_pictures->render() !!}

    </div>

    <div style="float: left; width: 41%;" id="family_section">

        Recent updates made:
        <ul class="list-group">
            @include ('activity.partials._list', [ 'hide_types' => [] ])
        </ul>


    </div>


</div>
@stop


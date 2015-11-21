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
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])


<br/>
        <h3><a href="/history">My family history</a></h3>
        <h3><a href="/images">My family album</a></h3>
        <h3><a href="/outline">Chronological Outline</a></h3><br/>


      <h4> <a href="/activity"> My additions to the family tree</a></h4> <br/>
        </div>

        <div style="float: left; width: 29%;" id="family_section">




            {{--{{$birthday_people}}--}}

            @if (count($birthday_people))
<b>Birthdays this month:</b>
                @foreach ($birthday_people as $birthday_person)
                    <li>
                        @include ('person.partials._person_link', ['person' => $birthday_person, 'show_flag'=>'N', 'show_book'=>'N']):
                        {{ date('M d, Y', strtotime($birthday_person->birthdate)) }}
                    </li>
                @endforeach
            @endif
            <br/>

</div>

    <div style="float: left; width: 42%;" id="family_section">


        @unless ($new_pictures->isEmpty())
            Recent pics added:
            @foreach($new_pictures as $image)
                @include ('partials._image_link', ['image' => $image])
            @endforeach
        @endunless

    </div>

    <div style="float: left; width: 100%;">



    </div>

</div>
@stop

@section('footer')
    Footer info
@stop
@extends('default')

@section('content')

<br/>Welcome: {{$user->name}}! <br/><br/>
<div style="float: right; width: 26%;">
    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            Happy birthday!
        @endif
    @endif
</div>

<div class="bottom">
    <div style="float: left; width: 18%;" id="family_section">



    Me:   <br/>
@include ('person.partials._person_link', ['person' => $person])
<br/><br/>
        My additions to the family tree: <a href="/activity">here</a>  <br/>
        </div>

        <div style="float: left; width: 28%;" id="family_section">

    My family history:<br/><br/>
    Chronolocial outline:<br/><br/>


            {{--{{$birthday_people}}--}}

            @if (count($birthday_people))
<b>Birthdays this month:</b>
                @foreach ($birthday_people as $birthday_person)
                    <li>
                        @include ('person.partials._person_link', ['person' => $birthday_person]):
                        {{ date('M d, Y', strtotime($birthday_person->birthdate)) }}

                    </li>
                @endforeach
            @endif
            <br/>


{{--Testing:--}}
            {{--Current month is {{Carbon\Carbon::now()->month}}--}}
            {{--My birth month is--}}
{{--My month_bit: {{$month_bit}}--}}
            {{--<php $this_month = extract('month', $person.birthdate ></php>--}}




</div>

    <div style="float: left; width: 48%;" id="family_section">


        @unless ($new_pictures->isEmpty())
            New pics this week:
            @foreach($new_pictures as $image)
                @include ('partials._image_link', ['image' => $image])
            @endforeach
        @endunless

       {{--<b>Notes I've added:</b> <br/>--}}
        {{--@foreach($notes_added as $note)--}}

            {{--might be nice to do person link and family link partials, but will have same problem as on person show with notes--}}

                {{--@if($note->type == '1')--}}
                    {{--<a href="/people/{{$note->ref_id}}"">View here</a>--}}
            {{--@else--}}
                {{--<a href="/families/{{$note->ref_id}}"">View here</a>--}}
                    {{--@endif--}}

            {{--{{$note->body}}<br/><br/>--}}
        {{--@endforeach--}}
    </div>

    <div style="float: left; width: 100%;">





    </div>

</div>
@stop

@section('footer')
    Footer info
@stop
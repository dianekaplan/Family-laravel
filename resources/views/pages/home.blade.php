@extends('default')

@section('content')

<br/>Welcome: {{$user->name}}! <br/><br/>
<div style="float: right; width: 33%;">
    @if ($person->birthdate)
        @if( $person->birthdate->month == \Carbon\Carbon::now()->month)
            Happy birthday!
        @endif
    @endif
</div>

<div class="bottom">
    <div style="float: left; width: 20%;">



    Me:   <br/>
@include ('person.partials._person_link', ['person' => $person])
<br/>
        </div>

        <div style="float: left; width: 20%;">

    My family history:<br/>
    Chronolocial outline:<br/>
    Celebrations this month:<br/>

            {{$birthday_people}}

            @if (count($birthday_people))

                @foreach ($birthday_people as $birthday_person)
                    <li>
                        @include ('person.partials._person_link', ['person' => $birthday_person])
                    </li>
                @endforeach
            @endif
{{--Testing:--}}
            {{--Current month is {{Carbon\Carbon::now()->month}}--}}
            {{--My birth month is--}}
{{--My month_bit: {{$month_bit}}--}}
            {{--<php $this_month = extract('month', $person.birthdate ></php>--}}




</div>

    <div style="float: left; width: 60%;">
        <a href="/activity">My Activity</a><br/>
        Recent additions:


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
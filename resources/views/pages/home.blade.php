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

        <div style="float: left; width: 26%;" id="family_section">

    My family history:<br/><br/>
    Chronolocial outline:<br/><br/>


            {{--{{$birthday_people}}--}}

            @if (count($birthday_people))
<b>Birthdays this month:</b>
                @foreach ($birthday_people as $birthday_person)
                    <li>
{{--If I can get it working the right way I can just do this:--}}
                        {{--@include ('person.partials._person_link', ['person' => $birthday_person])<br/>--}}

                       {{--Otherwise I need this:--}}
                        @if($birthday_person->face)
                            <img src="/faces/{{  $birthday_person->face  }}" class="img-rounded"/>
                        @else
                            <img src="/faces/noimage.gif" border="0" height="50" class="img-rounded"/>
                        @endif

                        @if($birthday_person->nickname)
                            <a href="{{ action('PeopleController@show', [$birthday_person->id]) }}">{{ $birthday_person->nickname }} {{ $birthday_person->last }}</a>
                        @else
                            <a href="{{ action('PeopleController@show', [$birthday_person->id]) }}">{{ $birthday_person->first }} {{ $birthday_person->last }}</a>
                        @endif


<br/>
                        {{ date('F d, Y', strtotime($birthday_person->birthdate)) }}
                    </li>
                @endforeach
            @endif
            <br/>
            <b>Anniversaries this month:</b>

{{--Testing:--}}
            {{--Current month is {{Carbon\Carbon::now()->month}}--}}
            {{--My birth month is--}}
{{--My month_bit: {{$month_bit}}--}}
            {{--<php $this_month = extract('month', $person.birthdate ></php>--}}




</div>

    <div style="float: left; width: 50%;" id="family_section">


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
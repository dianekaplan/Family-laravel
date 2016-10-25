// @TODO: revisit cisgender labels eventually

@if ($gender == 'female')

    @if ($family->no_kids_bool)
       <b> Wife:</b><br/>
    @else
        <b> Mother:</b><br/>
    @endif

@elseif($gender == 'male')

    @if ($family->no_kids_bool)
        <b>Husband:</b><br/>
    @else
        <b>Father:</b><br/>
    @endif

    @endif

@include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'Y'])<br/>

    {{--<a href="{{ action('PeopleController@show', [$person->id]) }}">{{$person->first}} {{$person->last}}</a>--}}
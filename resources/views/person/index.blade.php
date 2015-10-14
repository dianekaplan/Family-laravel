@extends('default')

@section('content')
    <h3>Person Index</h3>

    Keem Relatives: @include ('partials._people_list', ['person_group' => $keems]);
    Husband Relatives: @include ('partials._people_list', ['person_group' => $husbands]);
    Kemler relatives: @include ('partials._people_list', ['person_group' => $kemlers]);
    Kaplan/Kobrin relatives: @include ('partials._people_list', ['person_group' => $kaplans]);

    {{--Want to be able to do something like:--}}
    {{--for authenticated user, if kaplan_access is true, then:--}}
    {{--@include ('partials._people_list'), 'PeopleController@get_kaplans')--}}




<br/>


@stop
@extends('default')

@section('content')


<div class="bottom">
    <div style="float: left; width: 25%;"><h4>Keem Relatives:</h4> @include ('person.partials._people_list', ['person_group' => $keems])</div>
    <div style="float: left; width: 25%;"><h4>Husband Relatives: </h4>@include ('person.partials._people_list', ['person_group' => $husbands])</div>
    <div style="float: left; width: 25%;"><h4>Kemler relatives: </h4>@include ('person.partials._people_list', ['person_group' => $kemlers])</div>
    <div style="float: left; width: 25%;"><h4>Kaplan/Kobrin relatives:</h4> @include ('person.partials._people_list', ['person_group' => $kaplans])</div>
</div>


    {{--Want to be able to do something like:--}}
    {{--for authenticated user, if kaplan_access is true, then:--}}
    {{--@include ('partials._people_list'), 'PeopleController@get_kaplans')--}}


@stop
@extends('default')

@section('content')
    <h3>Person Index</h3>

    $joggers = action('PeopleController@get_joggers');


    {{--@include ('partials._people_list')--}}
    @include ('partials._people_list', ['person_group' => $people]);

    {{--Want to be able to do something like:--}}
    {{--for authenticated user, if kaplan_access is true, then:--}}
    {{--@include ('partials._people_list'), 'PeopleController@get_kaplans')--}}




<br/>


@stop
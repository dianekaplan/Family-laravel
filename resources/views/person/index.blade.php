@extends('default')

@section('content')

@include ('partials._title', ['user' => Auth::user()])</div>

<div class="bottom">

    {{--This works, but it's better to set a session variable once and check that (we'll have to repeat on family index, etc)--}}
    {{----}}

    @if([Auth::user()->keem_access])
    <div style="float: left; width: 25%;"><h4>Keem relatives:</h4> @include ('person.partials._people_list', ['person_group' => $keems])</div>
    @endif

        @if([Auth::user()->husband_access])
    <div style="float: left; width: 25%;"><h4>Husband relatives: </h4>@include ('person.partials._people_list', ['person_group' => $husbands])</div>
        @endif

        @if([Auth::user()->kemler_access])
    <div style="float: left; width: 25%;"><h4>Kemler relatives: </h4>@include ('person.partials._people_list', ['person_group' => $kemlers])</div>
        @endif

        @if([Auth::user()->kaplan_access])
    <div style="float: left; width: 25%;"><h4>Kaplan/Kobrin relatives:</h4> @include ('person.partials._people_list', ['person_group' => $kaplans])</div>
        @endif

</div>



@stop
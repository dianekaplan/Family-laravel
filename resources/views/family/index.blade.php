@extends('default')

@section('content')

@include ('partials._title', ['user' => Auth::user()])</div>


{{--{{[Auth::user()->keem_access]}}--}}



    <br/><br/>
    <div class="bottom">
        @if([Auth::user()->keem_access])
    <div style="float: left; width: 25%;"><h4>The Keem Family:</h4> @include ('family.partials._family_list', ['family_group' => $keem_families])</div>
        @endif

            @if([Auth::user()->husband_access])
    <div style="float: left; width: 25%;"><h4>The Husband Family: </h4>@include ('family.partials._family_list', ['family_group' => $husband_families])</div>
            @endif

            @if([Auth::user()->kemler_access])
    <div style="float: left; width: 25%;"><h4>The Kemler Family: </h4>@include ('family.partials._family_list', ['family_group' => $kemler_families])</div>
            @endif

            @if([Auth::user()->kaplan_access])
    <div style="float: left; width: 25%;"><h4>The Kaplan/Kobrin Family:</h4> @include ('family.partials._family_list', ['family_group' => $kaplan_families])</div>
            @endif
    </div>


    <br/>


@stop
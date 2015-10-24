@extends('default')

@section('content')

@include ('partials._title', ['user' => Auth::user()])</div>


    <br/><br/>
    <div class="bottom">
    <div style="float: left; width: 25%;"><h4>The Keem Family:</h4> @include ('family.partials._family_list', ['family_group' => $keem_families])</div>
    <div style="float: left; width: 25%;"><h4>The Husband Family: </h4>@include ('family.partials._family_list', ['family_group' => $husband_families])</div>
    <div style="float: left; width: 25%;"><h4>The Kemler Family: </h4>@include ('family.partials._family_list', ['family_group' => $kemler_families])</div>
    <div style="float: left; width: 25%;"><h4>The Kaplan/Kobrin Family:</h4> @include ('family.partials._family_list', ['family_group' => $kaplan_families])</div>
    </div>


    <br/>


@stop
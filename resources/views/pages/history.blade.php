@extends('default')

<?php
$access_tally=0;
        $only_one_side = false;
if ($user->keem_access)  $access_tally +=1;
if ($user->husband_access)  $access_tally +=1;
if ($user->kemler_access)  $access_tally +=1;
if ($user->kaplan_access)  $access_tally +=1;

        if ($access_tally == 1) $only_one_side = true;

?>



@section('content')

    <h3 align="center">
        Our Family Tree : History
    </h3>

    @if($only_one_side)
    <b>Your relation to this person:</b><br/>
    {{$user->connection_notes}}
    @endif

    @if($user->keem_access)
        <div style="float: left; width:100}%;" id="family_section">
        @include ('pages.partials._keem_history')
            </div>
    @endif
<br/>

    @if($user->husband_access)
        <div style="float: left; width:100}%;" id="family_section">
        @include ('pages.partials._husband_history')
        </div>
    @endif
    <br/>

    @if($user->kemler_access)
                <div style="float: left; width:100}%;" id="family_section">
        @include ('pages.partials._kemler_history')
                </div>
    @endif
    <br/>

    @if($user->kaplan_access)
                        <div style="float: left; width:100}%;" id="family_section">
        @include ('pages.partials._kaplan_history')
                        </div>
    @endif

@stop

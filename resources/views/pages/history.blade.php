@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : History
    </h3>


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

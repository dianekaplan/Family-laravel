@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : Outline
    </h3>

    <b>The original families for your branch(es) are: </b><br/><br/>

    @if (count($original_keems)&&($user->keem_access))
        @foreach ($original_keems as $family)
            <li>{{$family->caption}}</li>
            @endforeach
    @endif

    @if (count($original_husbands)&&($user->husband_access))
        @foreach ($original_husbands as $family)
            <li>{{$family->caption}}</li>
        @endforeach
    @endif

    @if (count($original_kemlers)&&($user->kemler_access))
        @foreach ($original_kemlers as $family)
            <li>{{$family->caption}}</li>
        @endforeach
    @endif

    @if (count($original_kaplans)&&($user->kaplan_access))
        @foreach ($original_kaplans as $family)
            <li>{{$family->caption}}</li>
        @endforeach
    @endif

    <br/>
    <b>The descendants of the original families: </b><br/>

    @if (count($original_keems)&&($user->keem_access))
        <div style="float: left; width:95%;" id="family_section">
        <h4 align="center">The Keem Family:</h4>
            @include ('pages.partials._show_outline_whole', ['results' => $keem_results])
            </div>
    @endif

    @if (count($original_husbands)&&($user->husband_access))
        <div style="float: left; width:95%;" id="family_section">
            <h4 align="center">The Husband Family:</h4>
            @include ('pages.partials._show_outline_whole', ['results' => $husband_results])
        </div>
    @endif

    @if (count($original_kemlers)&&($user->kemler_access))
        <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kemler Family:</h4>
            @include ('pages.partials._show_outline_whole', ['results' => $kemler_results])
        </div>
    @endif

    @if (count($original_kaplans)&&($user->kaplan_access))
        <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kaplan/Kobrin Family:</h4>
            @include ('pages.partials._show_outline_whole', ['results' => $kaplan_results])
        </div>
    @endif
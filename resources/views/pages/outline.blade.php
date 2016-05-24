@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : Outline [need to build]
    </h3>

    Value we cached: {{$test}} <br/>
    Results: {{$results}} <br/>
    New results: {{$results}}
    {{--<div style="float: left; width:95%;" id="family_section"><h4 align="center">test family:</h4>--}}
        {{--<a href="{{ action('FamilyController@show', [$test_family->id]) }}" class="g{{$test_family->seq}}">{{ $test_family->caption }} </a>--}}


    {{--@if (count($kids_temp))--}}
       {{--<h4 align="center">kids:</h4>--}}
            {{--@foreach ($kids_temp as $kid)--}}
                {{--@include ('person.partials._person_link_simple', ['person' => $kid]) <br/>--}}
                {{--<li>(Then show family's kids, and those kids' families, etc)</li>--}}
            {{--@endforeach--}}

        {{--Families for Larry:--}}
            {{--@foreach ($families_temp as $family)--}}
                {{--@include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq]) <br/>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--@endif--}}



    @if (count($original_keems)&&($user->keem_access))
        <div style="float: left; width:95%;" id="family_section">
        <h4 align="center">The Keems- original families:</h4>
        @foreach ($original_keems as $family)
            @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq]) <br/>
                <li>(Then show family's kids, and those kids' families, etc)</li>
        @endforeach

            </div>
    @endif

            @if (count($original_husbands)&&($user->husband_access))
                <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Husband Family:</h4>
                    @foreach ($original_husbands as $family)
                        @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
                        <li>(Then show family's kids, and those kids' families, etc)</li>
        @endforeach
                </div>
    @endif

                    @if (count($original_kemlers)&&($user->kemler_access))
                        <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kemler Family:</h4>
                            @foreach ($original_kemlers as $family)
                                @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
                                <li>(Then show family's kids, and those kids' families, etc)</li>
        @endforeach
                        </div>
    @endif

                            @if (count($original_kaplans)&&($user->kaplan_access))
                                <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kaplan/Kobrin Family:</h4>
                                    @foreach ($original_kaplans as $family)
                                        @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
                                        <li>(Then show family's kids, and those kids' families, etc)</li>
        @endforeach
                                </div>
    @endif
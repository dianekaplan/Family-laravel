@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : Outline
    </h3>

(Outline part to be done still)

    @if (count($original_keems)&&($user->keem_access))
        <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Keem Family:</h4>
        @foreach ($original_keems as $family)
            @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])-
                then show the kids from that family, and for each of them the families they made<br/>
        @endforeach
            </div>
    @endif

            @if (count($original_husbands)&&($user->husband_access))
                <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Husband Family:</h4>
                    @foreach ($original_husbands as $family)
                        @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
        @endforeach
                </div>
    @endif

                    @if (count($original_kemlers)&&($user->kemler_access))
                        <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kemler Family:</h4>
                            @foreach ($original_kemlers as $family)
                                @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
        @endforeach
                        </div>
    @endif

                            @if (count($original_kaplans)&&($user->kaplan_access))
                                <div style="float: left; width:95%;" id="family_section"><h4 align="center">The Kaplan/Kobrin Family:</h4>
                                    @foreach ($original_kaplans as $family)
                                        @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])<br/>
        @endforeach
                                </div>
    @endif
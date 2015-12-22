
<?php
$access_tally=0;
if ($user->keem_access)  $access_tally +=1;
if ($user->husband_access)  $access_tally +=1;
if ($user->kemler_access)  $access_tally +=1;
if ($user->kaplan_access)  $access_tally +=1;

$column_width = (100/$access_tally) - 2;
?>



    @if($user->keem_access)
        <div style="float: left; width:{{$column_width}}%;" id="family_section"><h4 align="center">The Keem Family:</h4>
        @if ($type == 'Families')
                    @include ('family.partials._family_list', ['family_group' => $keem_families])
                @elseif ($type == 'People')
                    @include ('person.partials._people_list', ['person_group' => $keems])
                @endif
        </div>
    @endif
</p>

    @if($user->husband_access)
        <div style="float: left; width:{{$column_width}}%;" id="family_section"><h4 align="center">The Husband Family:</h4>
            @if ($type == 'Families')
                @include ('family.partials._family_list', ['family_group' => $husband_families])
            @elseif ($type == 'People')
                @include ('person.partials._people_list', ['person_group' => $husbands])
            @endif
        </div>
    @endif
    @if($user->kemler_access)
        <div style="float: left; width:{{$column_width}}%;" id="family_section"><h4 align="center">The Kemler Family:</h4>
            @if ($type == 'Families')
                @include ('family.partials._family_list', ['family_group' => $kemler_families])
            @elseif ($type == 'People')
                @include ('person.partials._people_list', ['person_group' => $kemlers])
            @endif
        </div>
    @endif

    @if($user->kaplan_access)
        <div style="float: left; width:{{$column_width}}%;" id="family_section"><h4 align="center">The Kaplan/Kobrin Family:</h4>
            @if ($type == 'Families')
                @include ('family.partials._family_list', ['family_group' => $kaplan_families])
            @elseif ($type == 'People')
                @include ('person.partials._people_list', ['person_group' => $kaplans])
            @endif
        </div>
    @endif



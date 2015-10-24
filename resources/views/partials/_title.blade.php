<h3>
    Family Tree:
    {{--Auth::user()->person_id--}}
    @if($user->keem_access) Keem
    @endif
    @if($user->husband_access) Husband
    @endif
    @if($user->kemler_access) Kemler
    @endif
    @if($user->kaplan_access) Kaplan/Kobrin
    @endif
</h3>

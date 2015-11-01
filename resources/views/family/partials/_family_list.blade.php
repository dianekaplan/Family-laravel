@if (count($family_group))

    @foreach ($family_group as $family)

            @include ('family.partials._family_link', ['family' => $family, 'generation'=>$family->branch_seq])
        <br/>
        {{--<li><a href="{{ action('FamilyController@show', [$family->id]) }}" class=".g10">{{ $family->caption }} </a></li>--}}

    @endforeach
@endif


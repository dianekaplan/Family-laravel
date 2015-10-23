@if (count($family_group))

    @foreach ($family_group as $family)
        <li><a href="{{ action('FamilyController@show', [$family->id]) }}">{{ $family->caption }} </a></li>

    @endforeach
@endif
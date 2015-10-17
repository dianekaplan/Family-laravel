
@if (count($person_group))

    @foreach ($person_group as $person)
        <li>
        @include ('partials._person_link', ['person' => $person])
        </li>
    @endforeach
@endif
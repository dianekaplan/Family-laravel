@if (count($people))

    @foreach ($people as $person)
        <li class="jumble">
            @include ('person.partials._person_link_simple', ['person' => $person])
        </li>
    @endforeach

@endif
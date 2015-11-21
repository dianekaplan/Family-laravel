
@if (count($person_group))

    @foreach ($person_group as $person)
        <li>
            @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'Y', 'show_book'=>'N'])
        </li>
    @endforeach
@endif


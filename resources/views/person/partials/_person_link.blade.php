

@include ('person.partials._person_link_simple', ['person' => $person])
{{--@include ('person.partials._person_link_without_book', ['person' => $person])--}}

@if ($show_book == 'Y')
    @include ('person.partials._person_book', ['person' => $person])
@endif

@if ($show_flag == 'Y')
@include ('person.partials._person_flag', ['person' => $person])
@endif


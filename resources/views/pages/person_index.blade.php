@extends('default')

@section('content')
    Person Index

    @if (count($people))

        @foreach ($people as $person)
        <li>{{ $person }}</li>

        @endforeach
    @endif
<br/>
    Here's what we have for the database url (passed in from PeopleController.php): {{ $url_results }}


@stop
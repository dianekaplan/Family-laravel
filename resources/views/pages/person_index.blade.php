@extends('default')

@section('content')
    Person Index

    @if (count($people))

        @foreach ($people as $person)
        <li>{{ $person }}</li>

        @endforeach
    @endif

@stop
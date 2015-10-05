@extends('default')

@section('content')
    <h3>Family Index</h3>

    @if (count($families))

        @foreach ($families as $family)
            <li><a href="{{ action('FamilyController@show', [$family->id]) }}">{{ $family->caption }} </a></li>

        @endforeach
    @endif
    <br/>


@stop
@extends('default')

@section('content')
    <h3>Updates</h3>

    @if (count($updates))

        @foreach ($updates as $update)
        <li><a href="{{ action('UpdateController@show', [$update->id]) }}">{{ $update->summary }}</a></li>

        @endforeach
    @endif
<br/>


@stop
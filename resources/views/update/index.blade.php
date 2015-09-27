@extends('default')

@section('content')
    <h3>Updates</h3>

    @if (count($updates))

        @foreach ($updates as $update)
        <li><a href="{{ action('UpdateController@show', [$update->id]) }}">{{ $update->summary }}</a>
           -  Delete it
            <a href="{{ action('UpdateController@destroy', [$update->id]) }}">here</a>,
            {{--- Mark as updated--}}
            {{--<a href="{{ action('UpdateController@setAdded', [$update->id]) }}">here</a>--}}

        </li>

        @endforeach
    @endif
<br/>


@stop
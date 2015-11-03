@extends('default')

@section('content')

    <h3>{{$story->description}}</h3>

                    @include ($partial_display_link)

@stop

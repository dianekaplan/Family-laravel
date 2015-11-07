@extends('default')

@section('content')
    <h3>Images</h3>

    @if (count($images))

        @foreach ($images as $image)

            @include ('partials._image_link', ['image' => $image])

        @endforeach
    @endif
    <br/>


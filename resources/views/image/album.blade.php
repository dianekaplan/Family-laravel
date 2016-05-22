@extends('default')

@section('content')
    <h3 align="center">
        Family Album
    </h3>
    <div align="center">Mouse over each (and wait a couple seconds) to see who is in the picture</div>
    <div class="ninety_percent">
    @if (count($images))

        @foreach ($images as $image)

            @include ('partials._image_link', ['image' => $image, 'class' => "img_popup"])

        @endforeach
    @endif

    </div>

@stop
@extends('default')

@section('content')
    <h3 align="center">
        Home Movies
    </h3>

    @if (count($videos))

        @foreach ($videos as $video)
                @include ('video.partials._video_link', ['video' => $video])

        @endforeach
    @endif

    </p>
    <br/>


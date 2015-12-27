@extends('default')

@section('content')
    <h3 align="center">
        Home Movies
    </h3>

    <p>
    @if (count($videos))

        @foreach ($videos as $video)
                @include ('video.partials._video_link', ['video' => $video])<br/>

        @endforeach
    @endif

    </p>
    <br/>


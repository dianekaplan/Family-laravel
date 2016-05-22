@extends('default')

@section('content')
    <h3 align="center">
        Home Movies
    </h3>
    <div align="center">Mouse over each (and wait a couple seconds) to see who is in the video</div>

    @if (count($videos))

        @foreach ($videos as $video)
                @include ('video.partials._video_link', ['video' => $video, 'class' => "popup"])

        @endforeach
    @endif

    </p>
    @stop
{{--@stop - commented out to prevent centering so there's room for the side alley--}}

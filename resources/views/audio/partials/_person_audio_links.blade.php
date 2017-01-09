{{--Looking for audio files:--}}
@unless ($subject->audio_files->isEmpty())
    <div>
        <h4>Audio links: </h4>
        @foreach($subject->audio_files as $video)

            @include ('video.partials._video_link', ['video' => $video])
        @endforeach
        <br/>
    </div>
@endunless
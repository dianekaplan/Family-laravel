@unless ($subject->videos->isEmpty())
    <div>
        <h4>Videos: </h4>
        @foreach($subject->videos as $video)

            @include ('video.partials._video_link', ['video' => $video])
        @endforeach
        <br/>
    </div>
@endunless
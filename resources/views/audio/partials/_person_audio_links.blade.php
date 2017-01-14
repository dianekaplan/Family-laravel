@unless ($subject->audiofiles->isEmpty())
    <div>
        <h4>Audio links: </h4>
        @foreach($subject->audiofiles as $audiofile)
            {{--@include ('audio.partials._audio_link', ['audio' => $audiofile])--}}
            @include ('audio.partials._audio_link')
        @endforeach
        <br/>
    </div>
@endunless
@unless ($subject->stories->isEmpty())
    <div>
        @foreach($subject->stories as $story)

            <a href= "/stories/{{$story->id}}" target="_blank">
                <img  src="/icons/book.png" height="50"/>
                {{$story->description}}</a>:
            {{$story->intro}}...<a href= "/stories/{{$story->id}}"  target="_blank">Read More</a>
            <br/>
        @endforeach

    </div>
@endunless
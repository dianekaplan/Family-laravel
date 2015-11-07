@unless ($subject->stories->isEmpty())
    <div>
<!--@TODO: add book icon-->
        @foreach($subject->stories as $story)

            <a href= "/stories/{{$story->id}}" target="_blank">
                <img  src="/icons/book.png" height="50"/>
                {{$story->description}}</a>:
            {{$story->intro}}...<a href= "/stories/{{$story->id}}"  target="_blank">Read More</a>
        @endforeach
        <br/>

    </div>
@endunless
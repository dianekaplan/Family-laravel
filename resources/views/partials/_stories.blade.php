@unless ($subject->stories->isEmpty())
    <div>
<!--@TODO: add book icon-->
        @foreach($subject->stories as $story)
            <img  src="/icons/book.png"/>
            <a href= "/stories/{{$story->id}}" target="_blank">{{$story->description}}</a>:
            {{$story->intro}}...<a href= "/stories/{{$story->id}}"  target="_blank">Read More</a>
        @endforeach
        <br/>

    </div>
@endunless
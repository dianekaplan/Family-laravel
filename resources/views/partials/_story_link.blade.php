@unless ($subject->stories->isEmpty())
    <div>
<!--@TODO: add book icon-->
        @foreach($subject->stories as $story)
            <a href="stories/{{$story->slug}}" target="_blank">{{$story->description}}</a>:
            {{$story->intro}}...<a href="stories/{{$story->slug}}" target="_blank">Read More</a>
        @endforeach
        <br/>

        {{--@foreach($subject->stories as $story)--}}
            {{--<a href="http://www.newribbon.com/family/special/{{$story->slug}}.htm" target="_blank">{{$story->description}}</a>:--}}
            {{--{{$story->text}}...<a href="http://www.newribbon.com/family/special/{{$story->slug}}.htm" target="_blank">Read More</a>--}}
        {{--@endforeach--}}
    </div>
@endunless
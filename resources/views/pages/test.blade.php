
<div>
    <h4>Videos:</h4>
    @foreach($videos as $video)

        <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150", "class"=>"img-rounded" ));
        ?>

        {{--<a href= "/stories/{{$story->id}}" target="_blank">--}}
        {{--<img  src="/icons/book.png" height="50"/>--}}
        {{--{{$story->description}}</a>:--}}
        {{--{{$story->intro}}...<a href= "/stories/{{$story->id}}"  target="_blank">Read More</a>--}}
    @endforeach
    <br/>

</div>


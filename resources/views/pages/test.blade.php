
<div>
    <h4>Videos:</h4>
    @foreach($videos as $video)

        <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150", "class"=>"img-rounded", "controls"=>"true" ));
        ?>

        {{--<a href= "/stories/{{$story->id}}" target="_blank">--}}
        {{--<img  src="/icons/book.png" height="50"/>--}}
        {{--{{$story->description}}</a>:--}}
        {{--{{$story->intro}}...<a href= "/stories/{{$story->id}}"  target="_blank">Read More</a>--}}
    @endforeach
    <br/>

Same issue exists with sample file:
    <?php echo cl_video_tag("dog" , array( "cloud_name" => "demo", "width"=> "300", "height"=> "300", "controls"=>"true" ));
    ?>
    {{--cl_video_tag("dog", :width => 300, :height => 300,--}}
    {{--:crop => :pad, :background => "blue",--}}
    {{--:preload => "none", :controls => true,--}}
    {{--:fallback_content => "Your browser does not support HTML5 video tags" )--}}

</div>


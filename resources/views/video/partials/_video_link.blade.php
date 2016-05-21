

<ul id="gallery">

    <li>

        {{--<img id="img" src = "http://www.npworkoutmaker.com/img/question_small.jpg"  class="popup"--}}
             {{--alt='it looks like this'  width= "30" height= "20"/>--}}

        <a href="/video/{{ $video->id  }}">

            <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150",

                "class"=> "{{ $class }}","controls"=>"true", "data-video-id"=> $video->id ));
            ?>
            <br/>
            @if ($video->caption)
                ({{ $video->caption}})<br/>
            @endif

            @if ($video->year)
                ({{ $video->year}})<br/>
            @endif

        </a>

    </li>
</ul>


<!-- The modal for video contents popup, adapted from w3schools:
http://www.w3schools.com/howto/howto_css_modal_images.asp -->
<div id="myModal" class="modal">
    {{--<span class="close">x</span>--}}
    <div id="caption"></div>
</div>


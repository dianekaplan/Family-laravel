

<ul id="gallery">

    <li>


        <a href="/video/{{ $audio_file->id  }}">

            <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150",

                "class"=> "{{ $class }}","controls"=>"true", "data-video-id"=> $audio_file->id ));
            ?>
            <br/>
            @if ($audio_file->summary)
                ({{ $audio_file->summary}})<br/>
            @endif

            @if ($audio_file->recorded_date)
                ({{ $audio_file->recorded_date}})<br/>
            @endif

        </a>

    </li>
</ul>




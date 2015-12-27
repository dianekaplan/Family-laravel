
<a href="/video/{{ $video->id  }}">

<?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150", "class"=>"img-rounded","controls"=>"true" ));
?>
<br/>
    @if ($video->caption)
        ({{ $video->caption}})<br/>
    @endif

    @if ($video->year)
        ({{ $video->year}})<br/>
        @endif

</a>

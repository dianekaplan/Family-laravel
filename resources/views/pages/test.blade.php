
<div>
    <h4>Videos:</h4>
    @foreach($videos as $video)

        <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150", "class"=>"img-rounded", "controls"=>"true" ));
        ?>

    @endforeach
    <br/>


</div>


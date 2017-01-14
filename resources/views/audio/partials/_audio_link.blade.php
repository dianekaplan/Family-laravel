

<ul id="gallery">

    <li>
        <?php echo cl_video_tag($audiofile->filename , array( "cloud_name" => "hnyiprajv", "height"=> "35",
                "class"=> "{{ $class }}","controls"=>"true", "data-video-id"=> $audiofile->id ));
        ?>
        {!!  $audiofile->summary !!}, recorded {!!  $audiofile->recording_date !!}
    </li>
</ul>




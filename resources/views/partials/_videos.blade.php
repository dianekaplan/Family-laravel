@unless ($subject->videos->isEmpty())
    <div>
        <h4>Videos: (coming soon)</h4>
        @foreach($subject->videos as $video)

            <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "height"=> "150", "class"=>"img-rounded" ));
            ?>
        @endforeach
        <br/>

    </div>
@endunless

<ul id="gallery">
    <li>

        @if ($image->std_name)
            <?php echo cl_image_tag($image->std_name , array( "cloud_name" => "hnyiprajv", "height"=> "200", "class"=>"img-rounded" ));
            ?>
            {{--Needed this format when the tag stopped working:--}}
            {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->std_name  }}" height = "200" class="img-rounded">--}}
        @else
                 <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height"=> "200", "class"=>"img-rounded" ));
            ?>
        @endif


    </li>
</ul>
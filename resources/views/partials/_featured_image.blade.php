@if ($featured_image)
    @foreach($featured_image as $image)
        {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->std_name  }}" class="img-rounded">--}}

        <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height" => 200, "class"=>"img-rounded" )); ?>


    @endforeach
@endif

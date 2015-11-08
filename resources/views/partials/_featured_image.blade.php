@if ($featured_image)
    @foreach($featured_image as $image)
        {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->std_name  }}" class="img-rounded">--}}

        {{--@FIXME: same as image_link- need to figure out why this stopped working--}}
        <?
{{--        php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height" => 200, "class"=>"img-rounded" )); --}}
        ?>

        <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "200" class="img-rounded">


    @endforeach
@endif

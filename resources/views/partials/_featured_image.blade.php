@if ($featured_image)
    @foreach($featured_image as $image)
        {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->std_name  }}" class="img-rounded">--}}

        {{--@FIXME: same as image_link- need to figure out why this stopped working--}}

        <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "200" class="img-rounded">


    @endforeach
@endif

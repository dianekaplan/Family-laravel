@if ($featured_image)
    @foreach($featured_image as $image)

        @if ($image->std_name)
            <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->std_name  }}" height = "200" class="img-rounded">
        @else

        {{--@FIXME: same as image_link- need to figure out why this stopped working--}}
        <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "200" class="img-rounded">
        @endif
    @endforeach
@endif

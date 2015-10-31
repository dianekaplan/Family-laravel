@if ($featured_image)
    @foreach($featured_image as $image)
        <img src="http://newribbon.com/family/images/{{ $image->std_name  }}" class="img-rounded">
    @endforeach
@endif

<ul id="gallery">

<li>
    <a href="/image/{{ $image->id  }}">
    <img src="http://newribbon.com/family/images/{{ $image->little_name  }}" class="img-rounded">

        {{--<img src="{{ action('ImageController@show_image_from_cloudinary', [$image->little_name]) }}" class="img-rounded"/>--}}


        {{--<a href="{{ action('ImageController@show_image_from_cloudinary', [$image->big_name]) }}">here</a>--}}
        {{--http://family.app/image/cloudinary/diane_1982.jpg--}}

        <p>
    {{ $image->caption  }}

@if ($image->year)
({{ $image->year}})
    @endif
    </a></p>
</li>
</ul>
<ul id="gallery">

<li>
    <a href="/image/{{ $image->id  }}">
        <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height" => 100, "class"=>"img-rounded" ));?>
        {{--They all show up when I do this: --}}
        {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "100" class="img-rounded">--}}
        <p>
    {{ $image->caption  }}

@if ($image->year)
({{ $image->year}})
    @endif
    </a></p>
</li>
</ul>
<ul id="gallery">

<li>
    <a href="/image/{{ $image->id  }}">

        @if ($image->little_name)
            <?php echo cl_image_tag($image->little_name , array( "cloud_name" => "hnyiprajv", "height"=> "100",
                    "class"=> "{{ $class }}", "data-image-id"=> $image->id ));
            ?>
        {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->little_name  }}" height = "100" class="img-rounded">--}}
        @else
            <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height"=> "100",
                    "class"=> "{{ $class }}", "data-image-id"=> $image->id  ));
            ?>
                {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "100" class="img-rounded">--}}
        @endif
        <p>
    {!!  $image->caption   !!}

@if ($image->year)
({{ $image->year}})
    @endif
    </a></p>
</li>
</ul>

<!-- The modal for video contents popup, adapted from w3schools:
http://www.w3schools.com/howto/howto_css_modal_images.asp -->
<div id="myModal" class="modal">
    {{--<span class="close">x</span>--}}
    <div id="caption"></div>
</div>


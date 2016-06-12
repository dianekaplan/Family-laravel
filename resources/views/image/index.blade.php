@extends('default')

@section('content')
    <h3 align="center">
        Image index
    </h3>

    Add a <a href="/images/create">new image</a><br/>

    @if (count($images))

        @foreach ($images as $image)

            {{--@include ('partials._image_link', ['image' => $image])--}}

            <ul id="gallery">

                <li>
                    <a href="/configure/{{ $image->id  }}">
                        {{--less than ?--}}
                        {{--        php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "height" => 100, "class"=>"img-rounded" ));?>--}}

                        {{--They all show up when I do this: --}}
                        @if ($image->little_name)
                            <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->little_name  }}" height = "100" class="img-rounded">
                        @else
                            <img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" height = "100" class="img-rounded">
                        @endif
                        <p>
                            {{ $image->caption  }}

                            @if ($image->year)
                                ({{ $image->year}})
                        @endif
                    </a></p>
                </li>
            </ul>

        @endforeach
    @endif
    <br/>


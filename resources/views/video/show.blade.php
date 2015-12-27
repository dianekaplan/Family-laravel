@extends('default')

@section('content')
    {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">--}}
    <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded", "height" => "500","controls"=>"true" ));
    ?>
    <br/>

    {{ $video->caption  }}
    ({{ $video->year}})

    {{--List everybody who's in the picture (for group pictures--}}
    @foreach($video->people as $person)
        <li>@include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])</li>
    @endforeach
    <br/>


@stop
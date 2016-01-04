@extends('default')

@section('content')
<H4>{{ $video->caption  }} ({{ $video->year}})</H4>

People featured in this video:
*
    @foreach($video->people as $person)
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N']) *
    @endforeach
<br/>

    {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">--}}
    <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded", "height" => "500","controls"=>"true" ));
    ?>
    <br/>



    {{--List everybody who's in the picture (for group pictures--}}

    <br/>


@stop
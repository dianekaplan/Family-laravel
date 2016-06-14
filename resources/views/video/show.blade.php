@extends('default')

@section('content')
<H4>{{ $video->caption  }} ({{ $video->year}})</H4>


<div style="float: left; width: 80%;" >
    {{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">--}}
    <?php echo cl_video_tag($video->name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded", "height" => "500",
            "controls"=>"true" ));
    ?>
   </div>

{{--<div style="float: left; width: 10;" >--}}

    {{--People featured in this video:--}}
    @foreach($video->people as $person)
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])
        @if ($person->pivot->description)
           : {{$person->pivot->description}}
        @endif
        <br/>

@endforeach
{{--</div>--}}


@stop
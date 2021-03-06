@extends('default')

@section('content')
    <H4>{{ $image->caption  }} ({{ $image->year}})</H4>

    <div style="float: left; width: 85%;" >
{{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">--}}
<?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded" , "height" => "550"));
?>
    </div>

{{--List everybody who's in the picture (for group pictures--}}
        @foreach($image->people as $person_included)
                @include ('person.partials._person_link', ['person' => $person_included, 'show_flag'=>'N', 'show_book'=>'N'])
            <br/>
            @endforeach
<br/>

{{--@TODO: one day may add image associations for solo/family images, but that gets in the way of individual pictures --}}
{{--In the meantime, we handle them differently--}}

    @if ($person)
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])
    @endif

    @if ($family != null )
        @include ('person.partials._person_link', ['person' => $mother, 'show_flag'=>'N', 'show_book'=>'N'])<br/>
        @include ('person.partials._person_link', ['person' => $father, 'show_flag'=>'N', 'show_book'=>'N'])<br/>
        @foreach($kids as $kid)
            @include ('person.partials._person_link', ['person' => $kid, 'show_flag'=>'N', 'show_book'=>'N'])
            <br/>
        @endforeach
        <br/>
        Go to family page: <br/>    @include ('family.partials._family_link', ['family' => $family, 'generation' => 'NA'])
    @endif

@stop
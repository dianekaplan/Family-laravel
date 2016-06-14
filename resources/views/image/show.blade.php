@extends('default')

@section('content')
    <H4>{{ $image->caption  }} ({{ $image->year}})</H4>

    <div style="float: left; width: 85%;" >
{{--<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">--}}
<?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded" , "height" => "550"));
?>
    </div>

{{--List everybody who's in the picture (for group pictures--}}
        @foreach($image->people as $person)
                @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])
            <br/>
            @endforeach
<br/>


{{--@TODO: make script to go through images and add the appropriate image_person records so you can just handle it one way--}}
{{--Workaround in the meantime: generic link based on relevant id in the image record--}}

{{--Show person link:--}}
@if ($image->subject)
    <a href="{{ action('PeopleController@show', [$image->subject]) }}">Go to this person's page</a>
@endif

{{--Show family link:--}}
@if ($image->family)
    <a href="{{ action('FamilyController@show', [$image->family]) }}">Go to this family's page</a>
@endif

@stop
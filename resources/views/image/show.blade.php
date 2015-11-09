@extends('default')

@section('content')
<img src="http://res.cloudinary.com/hnyiprajv/image/upload/{{ $image->big_name  }}" class="img-rounded">
<?
{{--php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv", "class"=>"img-rounded" )); --}}
?>

<br/>

        {{ $image->caption  }}
    ({{ $image->year}})


{{--List everybody who's in the picture--}}
        @foreach($image->people as $person)

            <li>@include ('person.partials._person_link', ['person' => $person])</li>

            @endforeach

@stop
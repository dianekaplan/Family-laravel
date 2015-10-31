@extends('default')

@section('content')

{{--@FIXME: no clue why the img-rounded style isn't being applied here but it works the exact same way in featured_image--}}
    <img src="http://newribbon.com/family/images/{{ $image->big_name  }}" class="img-rounded"> <br/>
        {{ $image->caption  }}
    ({{ $image->year}})


{{--List everybody who's in the picture--}}
        @foreach($image->people as $person)

            <li>@include ('person.partials._person_link', ['person' => $person])</li>

            @endforeach

@stop
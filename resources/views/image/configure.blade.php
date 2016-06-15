@extends('default')

@section('content')


    <div style="float: left; width: 33%;">

    @if ($image->std_name)
            <?php echo cl_image_tag($image->std_name , array( "cloud_name" => "hnyiprajv",  "height" => "200" , "class"=>"img-rounded" ));
            ?>
    @else
            <?php echo cl_image_tag($image->big_name , array( "cloud_name" => "hnyiprajv",  "height" => "200" , "class"=>"img-rounded" ));
            ?>
    @endif

        <br/>
@if($image->subject)
        <b>Person link:  </b> <a href="/people/{{ $image->subject}}"> {{ $image->subject}} </a><br/>
@endif
        @if($image->family)
            <b>Family link:  </b> <a href="/families/{{ $image->family}}"> {{ $image->family}} </a><br/>
        @endif

        <br/><br/>
        <a href="/images">Back to image list</a>
    </div>


    <div style="float: left; width: 33%;">



        {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'PATCH']) !!}

        @include ('errors.list')

        <br/>

        @include ('image/partials._image_form')

        @include ('partials._family_bools')

            <div class="form-group">
                {!! Form::submit('Update Image', ['class' => 'btn btn-primary']) !!}


            </div>
        {!! Form::close() !!}

        </div>

    <div style="float: left; width: 33%;">
        <b> People:  </b>  <br/>


    {{--List everybody who's in the picture (for group pictures--}}
    @foreach($image->people as $person)
        @include ('person.partials._person_link', ['person' => $person, 'show_flag'=>'N', 'show_book'=>'N'])<br/>
    @endforeach
    <br/>



    {{--Show person link:--}}
    @if ($image->subject)
        <a href="{{ action('PeopleController@show', [$image->subject]) }}">Go to this person's page</a>
    @endif

    {{--Show family link:--}}
    @if ($image->family)
        <a href="{{ action('FamilyController@show', [$image->family]) }}">Go to this family's page</a>
    @endif

    </div>


@stop
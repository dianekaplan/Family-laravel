<h3 align="center">
    Test2 page
</h3>

<link rel="stylesheet" href="{{ elixir('css/all.css') }}">

{{--@TODO: add these into gulpfile.js, unless there's a reason for them to be separate--}}
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">



@if (count($people))

    @foreach ($people as $person)
        <li class="jumble">


            @include ('_person_link_without_book.blade.php', ['person' => $person])
        </li>
    @endforeach

@endif


    @if (count($images))

        @foreach ($images as $image)

            @include ('partials._image_link', ['image' => $image])

        @endforeach
    @endif
    <br/>

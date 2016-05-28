<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our big family tree</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>

<body>
{{--Google analytics include--}}
<?php include_once("analyticstracking.php") ?>
{{--End google analytics include--}}

@include ('partials._nav', ['user'=> \Auth::user(), 'person' => \Auth::user()->person])

<div class="container">

    @include('flash::message')
    {{--@include('Fbuilder::image')  <!--added to figure out image stuff- may not need-->--}}

{{--@include('partials.flash')--}}

@yield('content')

    <script src="/js/all.js"></script>


    <!--@TODO: added this in lecture 20 at 5:45, later make custom file with only what you need-->

    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}

    <script>
        $('#flash-overlay-modal').modal();
//        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>


    @include ('partials._footer')
    {{--@include ('partials._footer', ['user'=> \Auth::user()])--}}

{{--@yield('footer')--}}
</div>
</body>
</html>

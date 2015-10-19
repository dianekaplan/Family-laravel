<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel family tree</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    {{--<link rel="stylesheet" href="/css/style.css">--}}
    {{--<link rel="stylesheet" href="//maccdn.bootstrapcdn.com/bootstrap/3.2.0/css//bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    {{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css">--}}

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">


</head>

<body>

@include ('partials._nav')


<div class="container">

{{--<h1>Laravel family tree</h1>--}}

    @include('flash::message')
    {{--@include('Fbuilder::image')  <!--added to figure out image stuff- may not need-->--}}

{{--@include('partials.flash')--}}


@yield('content')

    <script src="/js/all.js"></script>

            <!-- Scripts -->
    {{--<script src="http://code.jquery.com/jquery.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>--}}

    //keep commented out for sure
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}




    <!--@TODO: added this in lecture 20 at 5:45, later make custom file with only what you need-->

    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}

    <script>
        $('#flash-overlay-modal').modal();
//        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>



@yield('footer')
</div>
</body>
</html>

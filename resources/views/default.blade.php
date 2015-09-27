<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel family tree</title>
    <Link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link real="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />


</head>

<body>
<div class="container">

<h1>Laravel family tree</h1>

    @include('flash::message')

{{--@include('partials.flash')--}}




@yield('content')

            <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!--@TODO: added this in lecture 20 at 5:45, later make custom file with only what you need-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
//        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

@yield('footer')
</div>
</body>
</html>

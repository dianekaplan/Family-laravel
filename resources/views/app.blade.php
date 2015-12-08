<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel family tree</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<!--got this from here along with auth views: https://github.com/bestmomo/scafold/blob/master/views/app.blade.php -->

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">

        @include('flash::message')


        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/landing">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            {{--<ul class="nav navbar-nav">--}}
                {{--<li><a href="{{ url('/') }}">Welcome</a></li>--}}
            {{--</ul>--}}

            <ul class="nav navbar-nav navbar-right">

                <li><a href="/register">Request a user</a></li>
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif
                    {{--@if(!Request::is('auth/register'))--}}
                        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
                    {{--@endif--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

        <!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
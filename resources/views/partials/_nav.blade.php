
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li class="active"><a href="/people">People</a></li>--}}
                <li><a href="/families">Families</a></li>
                <li><a href="/people">People</a></li>
                <li>{!! link_to_action('PeopleController@show', "Me!", [$user->person_id]) !!}</li>

                {{--<li><a href="/people/{{$user->person_id}}">My Page!</a></li>--}}
                {{--<li> @include ('person.partials._person_link', ['person' => $person])</li>--}}
            </ul>


            {{--@FIXME: come back and add logic in case nobody's logged in--}}

            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="/users">Users</a></li>--}}
                {{--<li><a href="/updates">Updates</a></li>--}}

                <li><a href="/account">My Account</a></li>
                <li><a href="/auth/logout">Log Out</a></li>
                {{--<li>{!! link_to_action('AuthController@getLogout','Log Out') !!}</li>--}}
                {{--<li>{!! link_to_action('UserController@show', Auth::user()->name, [Auth::user()->id]) !!}</li>--}}
            </ul>


        </div><!--/.nav-collapse -->
    </div>
</nav>
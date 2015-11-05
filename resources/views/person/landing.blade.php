<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel family tree</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

<!--this page doesn't use the default page because that needs a logged in user-->


</head>

<body>

    <h3>Welcome!</h3>

    Are you related to any of the folks below, or see yourself in this list? Welcome to our family tree website!
    I've spent years gathering info, dates, and pictures, and here is a place to share it all.
    To protect our family this website is password-protected, so if you're related and would like an account,
    please request it here.

    <br/><br/>
    Thanks!<br/>
    Diane Kaplan (Cambridge, MA USA)
    <br/>

    @include ('auth._login_partial');
    <br/><br/>


    {{--@include ('person.partials._people_list', ['person_group' => $people]);--}}
    {{--@TODO: Decide what to do here- I had been just using the _people_list partial, but on the landing page I want the list items to display inline, --}}
    {{--and I may exclude book icons, etc--}}
    @foreach ($people as $person)
        <li class="jumble">
            @include ('person.partials._person_link', ['person' => $person])
        </li>
    @endforeach

</body>
</html>


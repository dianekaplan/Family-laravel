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


    @include ('person.partials._people_list', ['person_group' => $people]);

</body>
</html>


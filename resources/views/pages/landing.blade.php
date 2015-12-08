
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel family tree</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
{{--//Tried extending 'app', but the page would load unstyled for a split second before loading--}}


<h3>Welcome!</h3>

Are you related to any of the folks below, or see yourself in this list? Welcome to our family tree website!
I've spent years gathering info, dates, and pictures, and here is a place to share it all.
To protect our family this website is password-protected, so if you're related and would like an account,
please request it
<a href="register">here</a>.

<br/><br/>
Thanks!<br/>
Diane Kaplan (Cambridge, MA USA)
<br/>

@include ('auth._login_partial');
<br/><br/>

@if (count($people))

    @foreach ($people as $person)
        <li class="jumble">
            @include ('person.partials._person_link_simple', ['person' => $person])

        </li>
    @endforeach

@endif

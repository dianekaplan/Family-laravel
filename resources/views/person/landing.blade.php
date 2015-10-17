{{--@extends('default')--}}

@section('content')


    {{--@include ('auth.login');--}}



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


    @include ('partials._people_list', ['person_group' => $people]);

@stop
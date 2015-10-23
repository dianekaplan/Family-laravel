@extends('default')

@section('content')

    <br/>Account info {{$user->name}}! <br/><br/>

    <div class="bottom">
        <div style="float: left; width: 33%;">
Logins: {{$user->logins}}

        </div>

        <div style="float: left; width: 33%;">



        </div>

        <div style="float: left; width: 33%;">

        </div>

Reset password link

    </div>
@stop


@section('footer')
    Footer info
@stop
@extends('default')

@section('content')

<br/>Welcome: {{$user->name}}! <br/><br/>

    User info: {{ $user }}<br/><br/>

    My Page: <a href="{{ action('PeopleController@show', [$user->person_id]) }}">{{$user->person_id}}</a><br/>


    My family history:<br/>
    Chronolocial outline<br/>
    Fun & general family history<br/>
    People in my family:<br/>


    <br/>
@stop

@section('footer')
    Footer info
@stop
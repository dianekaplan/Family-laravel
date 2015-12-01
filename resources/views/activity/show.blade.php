@extends('default')

@section('content')

    {{--<br/>Contributions to the family tree from {{$user->name}}: <br/><br/>--}}

    {{--<div class="bottom">--}}


    <div class=container">
   <ul class="list-group">
       @include ('activity.partials._list', ['hide_types' => [] ])
   </ul>

        </div>

@stop



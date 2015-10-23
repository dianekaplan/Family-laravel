@extends('default')

@section('content')

<br/>Welcome: {{$user->name}}! <br/><br/>

<div class="bottom">
    <div style="float: left; width: 33%;">



    Me:   <br/>
@include ('person.partials._person_link', ['person' => $person])
<br/>
        </div>

        <div style="float: left; width: 33%;">

    My family history:<br/>
    Chronolocial outline:<br/>
    Fun & general family history:<br/>

</div>

    <div style="float: left; width: 33%;">
    User info: {{ $user }}<br/><br/>
    </div>


</div>
@stop

@section('footer')
    Footer info
@stop
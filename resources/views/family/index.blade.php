
@extends('default')

@section('content')

@include ('partials._title', ['user' => Auth::user(), 'type'=>'Families'])</div>



@include ('partials._index_page_columns', ['user' => Auth::user(), 'type'=>'Families'])



    <br/>
<div style="float: left; width: 100%;">

@include ('family.partials._generation_key')


<h4>
<a href="branches" target="_blank">Who gets to be on this page?</a>
</h4>
    </div>
<br/>
@stop
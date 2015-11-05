@extends('default')

@section('content')

@include ('partials._title', ['user' => Auth::user(), 'type'=>'People'])</div>

<div class="bottom">


    @include ('partials._index_page_columns', ['user' => Auth::user(), 'type'=>'People'])


</div>

<div style="float: left; vertical-align: bottom; width: 100%;">
*Asterisk indicates the direct ancestors up from the four grandparents
    </div>

<br/><br/>
@stop
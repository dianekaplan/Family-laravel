@extends('default')

@section('content')
    <h3 align="center">Our Family Tree: Admin links </h3><br/>


    <div style="float: left; width: 23%;" id="family_section">
        Add a <a href="/auth/register">user</a><br/>
        Add a <a href="/people/create">person</a><br/>
        Add a <a href="/families/create">family</a><br/>
    </div>

    <div style="float: left; width: 23%;" id="family_section">
        Configure an <a href="/images">image</a><br/>
    </div>


    <div class="bottom">
        <div style="float: left; width: 23%;" id="family_section">
            See  <a href="/users">users</a><br/>
            See all <a href="/activities">activities</a><br/>
            See all <a href="/logins">logins</a><br/>
        </div>


    @section('footer')
            Footer info
@stop
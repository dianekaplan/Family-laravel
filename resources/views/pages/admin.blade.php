@extends('default')

@section('content')
    <h3 align="center">Our Family Tree: Admin links </h3><br/>


    <div style="float: left; width: 23%;" id="family_section">
        {{--Register a <a href="/auth/register">user</a><br/>--}}
        Add a <a href="/users/create">user</a><br/>
        Add a <a href="/people/create">person</a><br/>
        Add a <a href="/families/create">family</a><br/>
        <br/>
        Add an <a href="/images/create">image</a> (under construction)<br/>
    </div>

    <div style="float: left; width: 33%;" id="family_section">
        Update a <a href="/person_admin_fields">person</a> (add /id at the end)<br/>
        Update a <a href="/family_admin_fields">family</a> (add /id at the end)<br/>
        {{--{!! Form::open(array('url' => 'person_admin_fields')) !!}--}}

        {{--{!! Form::label('person_id','Update person ID:') !!}--}}
        {{--{!! Form::text('number', null, ['class' => 'form-control']) !!}--}}

        {{--{!! Form::submit('Go') !!}--}}
        {{--{!! Form::close() !!}--}}
        <br/><br/>
        Update <a href="/images">images</a> (under construction)<br/>
    </div>


    <div class="bottom">
        <div style="float: left; width: 33%;" id="family_section">
            See  <a href="/users">users</a><br/>
            See all <a href="/activities">activities</a><br/>
            See all <a href="/logins">logins</a><br/>
            <a href="/clearcache">Clear the database cache</a><br/>
            (afterward, build it again by visiting: album, videos, person list, outline)
        </div>


        @section('footer')
            Footer info
@stop

@extends('default')

@section('content')

    {{--@FIXME: figure out why user info doesn't come through despite being accessible on index page, and being the same as people pages--}}

    <h3>{{$user->name}}</h3>
    {{--{!! link_to_route('songs.edit', 'Edit this person', $person->first) !!}--}}

    {{--Here's everything: {{$user}}--}}

    ID: {{$user->id}}<br/>
    Name: {{$user->name}}<br/>
    Person id:  <a href="/people/{{$user->person_id}}">{{$user->person_id}}</a><br/>
    Connection notes: {{$user->connection_notes}}<br/>
    Furthest relatives: {!! $user->furthest_html !!}<br/>
    <br/>
    Logins:{{$user->logins}}<br/>
    last login:{{$user->last_login}}<br/>
    Email:{{$user->email}}<br/>
    Encrypted password:{{$user->password}}<br/>
    <br/>

    Active: {{$user->active}}<br/>
    Created at: {{$user->created_at}}<br/>
    Updated at: {{$user->updated_at}}<br/>
    Shared account: {{$user->shared_account}}<br/>
    Keem access: {{$user->keem_access}}<br/>
    Husband access: {{$user->husband_access}}<br/>
    Kemler access: {{$user->kemler_access}}<br/>
    Kaplan/Kobrin access: {{$user->kaplan_access}}<br/>
    Super admin: {{$user->super_admin}}<br/>
    Last pestered: {{$user->last_pestered}}<br/>



    {{--@TODO: come back and try again when not tired- episode 14, 12:17--}}
    {{--<li><a href="{{ action('UpdateController@user_updates', [$user->id]) }}">see suggested updates</a></li>--}}

@stop
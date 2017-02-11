@extends('default')

@section('content')
    <h3>Table view</h3> <br/>

    <h4>Content:</h4>

    Person table: {{ $highest_person_id}} <br/>
    Families table: {{ $highest_family_id}}<br/>
    Images table: {{ $highest_image_id}}. (Most recent: {{ $most_recent_image_name}})<br/><br/>
    Videos table: {{ $highest_video_id}}<br/>
    Stories table: {{ $highest_story_id}}<br/>
    Audiofiles table: {{ $highest_audiofile}}<br/><br/>

    Image_person table: {{ $highest_image_person_id}}<br/>
    Family_story table: {{ $highest_family_story}}<br/>
    Person_story table: {{ $highest_person_story}}<br/>
    Person_video table: {{ $highest_person_video}}<br/>
    {{--Family_video table: {{ $highest_family_video}}<br/>--}}
    Audiofile_person table: {{ $highest_audiofile_person}}<br/>


    <h4>Activity:</h4>
    Users table: {{ $highest_user}}<br/>
    Logins table: {{ $highest_login}}<br/>
    Activities table: {{ $highest_activities_id}}<br/>
    Notes table: {{ $highest_note}}<br/>
@stop
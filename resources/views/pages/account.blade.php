@extends('default')

@section('content')

    <br/>Account info for {{$user->name}} <br/><br/>

    <div class="bottom">
        <div style="float: left; width: 50%;">

            Created at: {{$user->created_at}}<br/>
            Email: {{$user->email}}<br/>
            Logins: {{$user->logins}}<br/>
            Password: {{$user->password}}<br/>
            <h4><a href="/activity">My Activity</a></h4>
            {{--Everything: {{$user}}<br/>--}}
        </div>

        <div style="float: left; width: 50%;">
Reset password link

        </div>



        {{--<div style="float: left; width: 100%;">--}}
            {{--<b>Notes I've added:</b> <br/>--}}
            {{--@foreach($notes_added as $note)--}}

                {{--might be nice to do person link and family link partials, but will have same problem as on person show with notes--}}

                {{--@if($note->type == '1')--}}
                    {{--<a href="/people/{{$note->ref_id}}"">View here</a>--}}
                {{--@else--}}
                    {{--<a href="/families/{{$note->ref_id}}"">View here</a>--}}
                {{--@endif--}}

                {{--{{$note->body}}<br/><br/>--}}
            {{--@endforeach--}}
        {{--</div>--}}

        {{--<div style="float: left; width: 100%;">--}}

            {{--<b>Updates I've suggested:</b> <br/>--}}



            {{--@foreach($updates_suggested as $update)--}}

                {{--For--}}
                {{--@if($update->person_id)--}}
                    {{--person: {{$update->person_id}}--}}
                {{--@elseif($update->family_id)--}}
                    {{--family:  {{$update->family_id}}--}}
                {{--@else--}}
                    {{--something else:--}}
                {{--@endif--}}
                {{--{{$update->update_summary}}<br/><br/>--}}
            {{--@endforeach--}}


        {{--</div>--}}
@stop


@section('footer')

@stop
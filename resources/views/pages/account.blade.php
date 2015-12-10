@extends('default')

@section('content')

    <br/>Account info for {{$user->name}} <br/><br/>

    <div class="bottom">
        <div style="float: left; width: 50%;">
            <b>Email: </b>{{$user->email}}<br/>
            <b>Account since:</b> {{ date('F d, Y', strtotime($user->created_at)) }} <br/>
            <b>Last login:</b> {{ date('F d, Y', strtotime($user->last_login)) }}<br/>
            <b>Times logging in:</b> {{$user->logins}}<br/>

                        {{--<h4><a href="/activity">My Activity</a></h4>--}}
        </div>

        <div style="float: left; width: 50%;">
<a href = "/password/email">Reset password</a>

        </div>

        <div style="float: left; width: 100%;">
        <br/>My additions to the family tree: <br/><br/>

            <div style="float: left; width: 100%;" id="family_section">
                <b>Notes/memories shared:</b> <br/><br/>

                @if (count($activity))
                    @foreach($notes_added as $note)

                        {{--might be nice to do person link and family link partials, but will have same problem as on person show with notes--}}

                        @if($note->type == '1')
                            <a href="/people/{{$note->ref_id}}">View here</a>
                        @else
                            <a href="/families/{{$note->ref_id}}">View here</a>
                        @endif

                        {{$note->body}}<br/><br/>
                    @endforeach
                @else
                    None yet.
                    @if ($person->family_of_origin)
                        How about updating adding one for <a href="/families/{{$person->family_of_origin}}">your family</a>?
                        @endif
                @endif
            </div>

            <div style="float: left; width: 100%;" id="family_section">
                <b>People & family updates made:</b><br/><br/>
                @if (count($activity))
                    <ul class="list-group">
                        @include ('activity.partials._list', [ 'hide_types' => ['App\Note'] ])
                    </ul>
                    @else
                {{--None yet.  How about updating <a href="/people/{{$user->person_id}}">your page</a>?--}}
                    None yet.  How about updating <a href="/people/{{$person->id}}">your page</a>?
                    @endif
            </div>


            @if (count($updates_suggested))
                <div style="float: left; width: 100%;" id="family_section">

                    <b>Updates made on old site:</b> <br/>


                        @foreach($updates_suggested as $update)

                            For
                            @if($update->person_id)
                                person: {{$update->person_id}}
                            @elseif($update->family_id)
                                family:  {{$update->family_id}}
                            @else
                                something else:
                            @endif
                            {{$update->update_summary}}<br/><br/>
                        @endforeach
                </div>
            @endif
</div>

@stop


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
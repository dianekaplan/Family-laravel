
<div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('first','First Name:') !!}
    {!! Form::text('first', null, ['class' => 'form-control']) !!}
    {!! $errors->first('first', '<span class="help-block">:message</span>') !!}

</div>

<div class="form-group">
    {!! Form::label('middle','Middle Name: (optional)') !!}
    {!! Form::text('middle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('last','Last Name:') !!}
    {!! Form::text('last', null, ['class' => 'form-control']) !!}
    {!! $errors->first('last', '<span class="help-block">:message</span>') !!}
</div>


<div class="form-group">
    {!! Form::label('maiden','Maiden Name: (optional)') !!}
    {!! Form::text('maiden', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nickname','Name you go by: (if different- optional)') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>

{{--//TODO:  make it default to the current value--}}
{{--//FIXME: it doesn't let you skip birthdate (because it tries saving the default string--}}
<div class="form-group">
    {!! Form::label('birthdate','Date of birth: (optional)') !!}
    {!! Form::input('date', 'birthdate', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('birthplace','Place of birth: (optional)') !!}
    {!! Form::text( 'birthplace', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('origin','National origin: (optional)') !!}
    {!! Form::text('origin', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('education','Education: (optional)') !!}
    {!! Form::text('education', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('work','Work: (optional)') !!}
    {!! Form::text('work', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('interests','Interests: (optional)') !!}
    {!! Form::text('interests', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('current_location','Current location: (optional)') !!}
    {!! Form::text('current_location', null, ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::label('deathdate','Death date: (optional)') !!}--}}
    {{--{!! Form::input('date', 'deathdate', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--//TODO:  make it default to the current value--}}
{{--<div class="form-group">--}}
    {{--{!! Form::label('gender','Gender:') !!}--}}

    {{--{!! Form::label('gender','Female:') !!}--}}
    {{--{!! Form::radio('gender', 'F') !!}--}}
    {{--{!! Form::label('gender','Male:') !!}--}}
    {{--{!! Form::radio('gender', 'M') !!}--}}
{{--</div>--}}

{{--//@FIXME:  make it default to the current value, now showing false even when true in db--}}

{{--@include ('partials._family_bools')--}}



{{--<div class="form-group">--}}
    {{--{!! Form::label('tag_list','Tags:') !!}--}}
    {{--{!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}--}}
    {{--<!--name of the select element, the defaults, the selected option in the list, additional attributes-->--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('tag_list','Tags:') !!}--}}
    {{--{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}--}}
            {{--<!--name of the select element, the defaults, the selected option in the list, additional attributes-->--}}
{{--</div>--}}


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>

@section('footer')

        <!--Fetch our kaplan_bool and call select2 on it -->
{{--//got a bug once I gulped all the scripts together in episode 24--}}
    {{--<script>--}}
        {{--$('#kaplan_line').select2({--}}
            {{--placeholder: 'Choose yes or no'--}}
        {{--});--}}
    {{--</script>--}}

    <!--Fetch our tag_list and call select2 on it -->
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
//            , tags:true  //This'll let the user add a new one (type and hit Enter), but for it to work we need to add code
//          to save the new tag
            //@FIXME
            //see also 5:36 of laracast 24 to see how to specify which ones display
            // // Another  way is (at 7:50): put it in the public folder
//            ajax: {
//                dataType: 'json',
//                url: 'tags.json'
//            }
        });
    </script>

@endsection

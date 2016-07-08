


<div class="form-group">
    {!! Form::label('face', 'Face image: (optional)') !!}
    {!! Form::text('face', null, ['class' => 'form-control']) !!}
</div>


{{--//TODO:  make it default to the current value--}}
<div class="form-group">
    {!! Form::label('show_on_landing_page','Show on landing page:') !!}
    {!! Form::select('show_on_landing_page', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('gender','Gender:') !!}

    {!! Form::label('gender','Female:') !!}
    {!! Form::radio('gender', 'F') !!}
    {!! Form::label('gender','Male:') !!}
    {!! Form::radio('gender', 'M') !!}
</div>

<div class="form-group">
    {!! Form::label('flag1', 'Flag1: (optional)') !!}
    {!! Form::text('flag1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('flag2', 'Flag2: (optional)') !!}
    {!! Form::text('flag2', null, ['class' => 'form-control']) !!}
</div>


{{--<div class="form-group">--}}
    {{--{!! Form::label('deathdate', 'Actual death date for admins: (not note field)') !!}--}}
    {{--{!! Form::text('deathdate', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

@include ('partials._family_bools')



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
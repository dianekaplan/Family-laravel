
{{--Remember: family edit is only available to super admins--}}

<div class="form-group">
    {!! Form::label('caption','Caption:') !!}
    {!! Form::text('caption', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('mother_id','Mother ID:') !!}
    {!! Form::text('mother_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('father_id','Father ID:') !!}
    {!! Form::text('father_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('no_kids_bool','No kids:') !!}
    {!! Form::select('no_kids_bool', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('marriage_date','Date of marriage, in format YYYY-MM-DD: (optional)') !!}
    {!! Form::text( 'marriage_date', null, ['class' => 'form-control']) !!}
    </div>

<div class="form-group">
    {!! Form::label('notes1','Notes field 1: (optional)') !!}
    {!! Form::text( 'notes1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('notes2','Notes field 2: (optional)') !!}
    {!! Form::text( 'notes2', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>

@section('footer')




@endsection

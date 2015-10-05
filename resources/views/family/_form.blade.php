
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
    {!! Form::label('marriage_date','Date of marriage: (optional)') !!}
    {!! Form::input('date', 'marriage_date', null, ['class' => 'form-control']) !!}
</div>

@include ('partials._family_bools')


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>

@section('footer')




@endsection


{{--//TODO: not sure where, but somewhere we want to save a hashed password instead of orig--}}
{{--//Hash::make('password')--}}

<div class="form-group{{ $errors->has('summary') ? 'has-error' : '' }}">
    {!! Form::label('update_summary','Update summary:') !!}
    {!! Form::text('update_summary', null, ['class' => 'form-control']) !!}
    {!! $errors->first('update_summary', '<span class="help-block">:message</span>') !!}
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::label('user_id','User ID:') !!}--}}
    {{--{!! Form::text('user_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

</div>


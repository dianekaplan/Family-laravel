
{{--<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">--}}
<div class="form-group">
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {{--{!! $errors->name('name', '<span class="help-block">:message</span>') !!}--}}
</div>

<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    {{--{!! $errors->name('name', '<span class="help-block">:message</span>') !!}--}}
</div>


<div class="form-group">
    {!! Form::label('related','Who did you see in the list that you are related to?  How are you related?') !!}
    {!! Form::textarea('related', null, ['class' => 'form-control']) !!}
    {{--{!! $errors->name('related', '<span class="help-block">:message</span>') !!}--}}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>

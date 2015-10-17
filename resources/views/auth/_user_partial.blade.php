{{--<div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">--}}
{{--{!! Form::label('name','Name:') !!}--}}
{{--{!! Form::text('name', null, ['class' => 'form-control']) !!}--}}
{{--{!! $errors->first('name', '<span class="help-block">:message</span>') !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--{!! Form::label('email','Email:') !!}--}}
{{--{!! Form::text('email', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">--}}
{{--{!! Form::label('password','Password:') !!}--}}
{{--{!! Form::text('password', null, ['class' => 'form-control']) !!}--}}
{{--{!! $errors->first('password', '<span class="help-block">:message</span>') !!}--}}
{{--</div>--}}

<div class="form-group">
    {!! Form::label('person_id','Person_id:') !!}
    {!! Form::text('person_id', null, ['class' => 'form-control']) !!}
</div>

{{--{!! Form::hidden('person_id', 1)  !!}--}}

<div class="form-group">
    {!! Form::label('connection_notes','Connection notes:') !!}
    {!! Form::text('connection_notes', null, ['class' => 'form-control']) !!}
</div>

{{--//TODO:  make it default to the current value--}}
<div class="form-group">
    {!! Form::label('keem_access','Keem Access:') !!}
    {!! Form::select('keem_access', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('husband_access','Husband Access:') !!}
    {!! Form::select('husband_access', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('kemler_access','Kemler Access:') !!}
    {!! Form::select('kemler_access', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('kaplan_access','Kaplan Access:') !!}
    {!! Form::select('kaplan_access', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}--}}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>


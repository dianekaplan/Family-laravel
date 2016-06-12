
{{--//TODO: not sure where, but somewhere we want to save a hashed password instead of orig--}}
{{--//Hash::make('password')--}}

<div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    {{--{!! Form::text('email', {{$user->email}}, ['class' => 'form-control']) !!}--}}
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('password','Password:') !!}- add it encrypted for now
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('person_id','Person_id:') !!}
    {!! Form::text('person_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('connection_notes','Connection notes:') !!}
    {!! Form::text('connection_notes', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('furthest_html','Furthest relatives:') !!}
    {!! Form::text('furthest_html', null, ['class' => 'form-control']) !!}
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

<div class="form-group">
    {!! Form::label('created_at','Created at: (optional)') !!}
    {!! Form::input('date', 'created_at', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('logins','Logins:') !!}
    {!! Form::text('logins', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('last_login','Last Login: (optional)') !!}
    {!! Form::input('date', 'last_login', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('last_pestered','Last Pestered: (optional)') !!}
    {!! Form::input('date', 'last_pestered', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('active_bool','Active:') !!}
    {!! Form::select('active_bool', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('shared_account','Shared Account:') !!}
    {!! Form::select('shared_account', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

    {{--{!! Form::submit('Save Person', ['class' => 'btn btn-primary form-control']) !!}--}}
</div>


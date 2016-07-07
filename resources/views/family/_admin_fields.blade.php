

<div class="form-group">
    {!! Form::label('branch','Branch (1:Keem, 2:Husband, 3:Kemler, 4:Kaplan/Kobrin)') !!}
    {!! Form::text('branch', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('branch_seq','Branch sequence:') !!}
    {!! Form::text('branch_seq', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('show_on_branch_view_bool','Show on branch view:') !!}
    {!! Form::select('show_on_branch_view_bool', array('Choose:',  'True'=>'True', 'False'=>'False'), ['class' => 'form-control']) !!}
</div>


{{--<div class="form-group">--}}
    {{--{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}--}}
    {{--}--}}
{{--</div>--}}


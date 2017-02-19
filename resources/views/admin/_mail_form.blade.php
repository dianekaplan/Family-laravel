
<div class="form-group">
    {!! Form::label('recipient_list','Recipient List:') !!}
    {!! Form::text('recipient_list', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('subject','Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('body','Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

</div>

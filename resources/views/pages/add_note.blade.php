@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : Add a note
    </h3>



    Add your note for {{$name}}:


<div class="form-group">
    {!! Form::label('body','Note contents:') !!}
    {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Add note', ['class' => 'btn btn-primary']) !!}


</div>

@section('footer')



@endsection

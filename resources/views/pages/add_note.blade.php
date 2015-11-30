@extends('default')

@section('content')

    <h3 align="center">
        Our Family Tree : Add a note
    </h3>

{{--{{$flag}}--}}

    Add your note for {{$name}}:

    {!! Form::open(['url' => 'add_note/save']) !!}


<div class="form-group">
    {!! Form::label('body','Note contents:') !!}
    {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">

    {!! Form::hidden('type', $type, array('id' => 'invisible_id')) !!}
    {!! Form::hidden('ref_id', $id, array('id' => 'invisible_id')) !!}
    {{--{!! Form::hidden('flag', $flag, array('id' => 'invisible_id')) !!}--}}

    {!! Form::submit('Add note', ['class' => 'btn btn-primary']) !!}


</div>

@section('footer')



@endsection

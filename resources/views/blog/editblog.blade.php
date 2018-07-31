@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขความคิดเห็น</h1>
        <hr>
            {!! Form::model($blog, ['route'=>['blog.update', $blog->id],'method'=>'PATCH','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}
            <input type="hidden" name="id" value="{{{ $blog->id }}}"> 
            <div class="form-group">
                {!! Form::label('comment','ความคิดเห็น',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
                    {!! $errors->has('comment')?$errors->first('comment'):'' !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('บันทึก',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

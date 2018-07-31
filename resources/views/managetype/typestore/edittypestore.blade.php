@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขประเภทร้านอาหาร</h1>
        <hr>
            {!! Form::model($typestore, ['route'=>['typestore.update', $typestore->id],'method'=>'PATCH','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('typename','ชื่อประเภทร้านอาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('typename',null,['class'=>'form-control']) !!}
                    {!! $errors->has('typename')?$errors->first('typename'):'' !!}
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

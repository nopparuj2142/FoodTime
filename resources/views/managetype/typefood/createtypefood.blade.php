@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>สร้างประเภทอาหาร</h1>    
            {!! Form::open(['action' => 'TypefoodController@store','class'=>'form-horizontal','enctype' => 'multipart/form-data','method' => 'POST']) !!}
                {{--  {{ Form::hidden('id_typestore', $id_typestore) }}  --}}
            
            <div class="form-group">              
                {!! Form::label('typename','ชื่อประเภทอาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('typename',null,['class'=>'form-control']) !!}
                    {!! $errors->has('typename')?$errors->first('typename'):'' !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">  
                    {!! Form::submit('สร้าง',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

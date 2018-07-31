@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขบัญชี</h1>
        <hr>
            {!! Form::model($user, ['route'=>['profile.update', $user->id],'method'=>'PATCH','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}
            <div class="form-group">   
                {!! Form::label('avatar','รูปประจำตัว',['class'=>'control-label col-md-2']) !!}            
                <div class="col-md-10">
                    {{--  <img src="/uploads/profilestore/{{$test}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">  --}}
                    <img src="/uploads/avatars/{{ $user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name','ชื่อผู้ใช้',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                    {!! $errors->has('name')?$errors->first('name'):'' !!}
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

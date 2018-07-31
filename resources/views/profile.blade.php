@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
            <br>
            <br>
            <h1>บัญชี {{$user->name}}</h1>
            {{--  <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="submit" class="pull-right btn  btn-sm btn-primary">
            </form>  --}}
        </div>
    </div>
    <hr>
{{--  infonation  --}}
    <h2>ข้อมูลทั่วไป</h2>
    <form class="form-horizontal">
        <div class="form-group">                
            {!! Form::label('username','ชื่อผู้ใช้ :',['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">                    
                {!! Form::label('username',$user->name,['class'=>'form-control-static']) !!}
            </div>
        </div>
        <div class="form-group">                
            {!! Form::label('useremaul','อีเมล์ :',['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">                    
                {!! Form::label('useremaul',$user->email,['class'=>'form-control-static']) !!}
            </div>
        </div>
        <div class="form-group">                
            {!! Form::label('created','วันเวลาที่สร้าง :',['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">                    
                {!! Form::label('create',$user->created_at,['class'=>'control-label form-control-static']) !!}
            </div>
        </div>
        <div class="form-group">                
            {!! Form::label('lastupdate','วันเวลาที่แก้ไขครั้งล่าสุด :',['class'=>'control-label col-md-2']) !!}
            <div class="col-md-10">                    
                {!! Form::label('lastupdate',$user->updated_at,['class'=>'form-control-static']) !!}
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <a href="profile/{{$user->id}}/edit" class="btn btn-success">แก้ไขบัญชี</a>
            </div>
        </div>

    </form>
</div>
@endsection

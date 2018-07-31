@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขอาหาร</h1>
        <hr>
            {!! Form::model($food, ['route'=>['myfoods.update', $food->id],'method'=>'PATCH','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}
            <input type="hidden" name="id" value="{{{ $food->id }}}"> 
            <div class="form-group">   
               {!! Form::label('pic','รูปอาหาร',['class'=>'control-label col-md-2']) !!}            
                <div class="col-md-10">
                    
                    <img class="img-responsive" src="/uploads/foodpicture/{{$food->picturefood}}" style="width:350px; height:200px;" >
                    <input type="file" name="picfood">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('namefood','ชื่ออาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('namefood',null,['class'=>'form-control']) !!}
                    {!! $errors->has('namefood')?$errors->first('namefood'):'' !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('detail','รายละเอียด',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('detail',null,['class'=>'form-control']) !!}
                    {!! $errors->has('detail')?$errors->first('detail'):'' !!}
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

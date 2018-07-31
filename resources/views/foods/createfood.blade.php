@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>สร้างอาหารใหม่</h1>    
            {!! Form::open(['action' => 'FoodController@store','class'=>'form-horizontal','enctype' => 'multipart/form-data','method' => 'POST']) !!}
                {{ Form::hidden('id_store', $id_store) }}
            <div class="form-group">   
                {!! Form::label('pic','รูปอาหาร',['class'=>'control-label col-md-2']) !!}            
                <div class="col-md-10">
                    
                    <img class="img-responsive" src="/uploads/foodpicture/{{$default}}" style="width:350px; height:200px;" >
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
                {!! Form::label('typestore','ประเภทอาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    <select class='selectpicker' name="type">
                        <option>select</option>
                        @foreach ($typefood as $typefood)
                            <option value="{{$typefood->id}}">{{$typefood->typename}}</option>
                        @endforeach
                    </select>
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
                    {!! Form::submit('สร้าง',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

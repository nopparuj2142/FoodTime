@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>ส่งข้อความ</h1>
        <hr>
        {!! Form::model($store, ['action'=>['ManagestoreController@sendmail', $store->id_store],'method'=>'GET','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}
        {{ Form::hidden('id',$store->id_store) }}
        <div class="form-group">              
                {!! Form::label('message','ส่งถึง',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-8">
                    {!! Form::label('namestore',$store->namestore,['class'=>'control-label']) !!}
                </div>
            </div>
            <div class="form-group">              
                {!! Form::label('message','แนบข้อความ',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-8">
                    {!! Form::textarea('message',null,['class'=>'form-control']) !!}
                    {!! $errors->has('message')?$errors->first('message'):'' !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">  
                    {!! Form::submit('ส่งข้อความ',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
             
        {!! Form::close() !!}
    </div>
@endsection
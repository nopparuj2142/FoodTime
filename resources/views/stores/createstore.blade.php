@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>สร้างร้านอาหารใหม่</h1>
            {!! Form::open(['action' => 'StoreController@store','class'=>'form-horizontal','enctype' => 'multipart/form-data','method' => 'POST']) !!}
            <div class="form-group">   
                {!! Form::label('pic','รูปร้านอาหาร',['class'=>'control-label col-md-2']) !!}            
                <div class="col-md-10">
                    {{--  <img src="/uploads/profilestore/{{$test}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">  --}}
                    <img class="img-responsive" src="/uploads/profilestore/{{$default}}" style="width:350px; height:200px;" >
                    <input type="file" name="picstore">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </div>
            </div>
            <div class="form-group">                
                {!! Form::label('namestore','ชื่อร้านอาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">                    
                    {!! Form::text('namestore',null,['class'=>'form-control']) !!}
                    {!! $errors->has('namestore')?$errors->first('namestore'):'' !!}
                </div>
            </div>
            <div class="form-group">              
                {!! Form::label('typestore','ประเภทร้านอาหาร',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    <select class="form-control" name="type">
                        <option selected>เลือกประเภท...</option>
                        @foreach ($typestores as $typestore)
                            <option value="{{$typestore->id}}">{{$typestore->typename}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">              
                {!! Form::label('detail','รายละเอียด',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('detail',null,['class'=>'form-control','rows'=>'3']) !!}
                    {!! $errors->has('detail')?$errors->first('detail'):'' !!}
                </div>
            </div>
            <div class="form-group">              
                {!! Form::label('address','ที่อยู่',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('address',null,['class'=>'form-control','rows'=>'3']) !!}
                    {!! $errors->has('address')?$errors->first('address'):'' !!}
                </div>
            </div>
{{-- Time --}}
            <div class="form-group">                
                {!! Form::label('timeopen','เวลาเปิด',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-1">                    
                    {!! Form::text('timeopen',null,['class'=>'form-control']) !!}
                    {!! $errors->has('timeopen')?$errors->first('timeopen'):'' !!}
                </div>
                {!! Form::label('timeclose','เวลาปิด',['class'=>'control-label col-md-1']) !!}
                <div class="col-md-1">                    
                    {!! Form::text('timeclose',null,['class'=>'form-control']) !!}
                    {!! $errors->has('timeclose')?$errors->first('timeclose'):'' !!}
                </div>
            </div>
{{-- Time End --}}
            <div class="form-group">                
                {!! Form::label('urlvideo','ลิ้งค์รีวิวร้าน',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">                    
                    {!! Form::text('urlvideo',null,['class'=>'form-control']) !!}
                    {!! $errors->has('urlvideo')?$errors->first('urlvideo'):'' !!}
                </div>
            </div>
             <div class="form-group">              
                {!! Form::label('location','ตำแหน่งที่ตั้ง',['class'=>'control-label col-md-2']) !!}
                 <div class="col-md-10"> 
                    <div id="map-canvas" style="width:550px; height:250px;"></div>
                     <input type="hidden" class="form-control input-sm" name="lat" id="lat">
                     <input type="hidden" class="form-control input-sm" name="lng" id="lng">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">  
                    {!! Form::submit('สร้าง',['class'=>'btn btn-primary col-md-2']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@endsection
@section('script')
    <script type="text/javascript">

            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });

    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat:15.24,
            lng:104.84
        },
        zoom:12
        });

    var marker = new google.maps.Marker({
        position:{
            lat:15.24,
            lng:104.84
        },
        map:map,
        draggable:true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBound();
        var i,place;
        for(i=0; place=places[i];i++){
            bound.extend(place.geometry.location);
            maker,setPosition(place.geometry.location); //set marker position new...
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    
    google.maps.event.addListener(marker,'position_changed',function(){
        // var lat = marker.getPosition().lat();
        // var lng = marker.getPosition().lng();
        var lat = 15.24;
        var lng = 104.84;
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>แก้ไขร้านอาหาร</h1>
        <hr>
            {!! Form::model($select, ['route'=>['stores.update', $select->id_store],'method'=>'PATCH','class'=>'form-horizontal','enctype'=> 'multipart/form-data']) !!}

            <div class="form-group">   
                {!! Form::label('pic','รูปร้านอาหาร',['class'=>'control-label col-md-2']) !!}            
                <div class="col-md-10">
                    {{--  <img src="/uploads/profilestore/{{$test}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">  --}}
                    <img class="img-responsive" src="/uploads/profilestore/{{$select->profilestore}}" style="width:350px; height:200px;" >
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
                <div class="col-md-10">
                    <select class='selectpicker' name="type">
                        

                        @foreach ($typestores as $typestore)
                            @if ($select->typename == $typestore->typename)
                                <option value="{{$typestore->id}}"  selected>{{$typestore->typename}}</option>
                            @else
                            <option value="{{$typestore->id}}">{{$typestore->typename}}</option>
                                
                            @endif
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
                {!! Form::label('address','ที่อยู่',['class'=>'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('address',null,['class'=>'form-control']) !!}
                    {!! $errors->has('detail')?$errors->first('detail'):'' !!}
                </div>
            </div>
             <div class="form-group">              
                {!! Form::label('location','ตำแหน่งที่ตั้ง',['class'=>'control-label col-md-2']) !!}
                 <div class="col-md-10">
                     
                    <div id="map-canvas" style="width:550px; height:250px;"></div>
                     <input type="hidden" class="form-control input-sm" name="lat" value="{{$select->lng}}" id="lat">
                     <input type="hidden" class="form-control input-sm" name="lng" value="{{$select->lng}}" id="lng">
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

@section('script')
    <script>
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat:<?=$select->lat;?>,
            lng:<?=$select->lng;?>
        },
        zoom:10
        });

    var marker = new google.maps.Marker({
        position:{
            lat:<?=$select->lat;?>,
            lng:<?=$select->lng;?>
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
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>
@endsection

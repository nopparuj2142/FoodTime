@extends('layouts.app')

@section('content')
    <div class="container">     
{{-- ***STORE*** --}}
        <div class="form-group">              
        <center><img src="/uploads/profilestore/{{$select->profilestore}}" style="width:750px; height:450px; "></center>
        </div>
        <form class="form-horizontal">
            <div class='form-group'>
                <h1 class="col-sm-4">{{$select->namestore}}</h1>
                <div class="col-md-2" style="float:right;">
                    @if (Auth::guest())
                    @else
                        @if ($sttfvr == "yes")
                            {{-- <a href="{{ route('favorite.destroy',$select->id_favorite)}}" class="btn btn-danger btn-lg" style="#">Unfavorite</a> --}}
                        @else
                            <a href="/addfavorite/{{$select->id_store}}" class="btn btn-warning btn-lg" style="#">เพิ่มในรายการโปรด</a>
                        @endif
                    @endif
                </div>
            </div>
        </form>
        <hr>
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">                
                        <label class="control-label col-sm-3" for="typestore">ประเภทร้านอาหาร:</label>
                        <div class="col-md-9">                    
                            <p class="form-control-static">{{$select->typename}}</p>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="control-label col-sm-3" for="detail">รายละเอียด:</label>
                        <div class="col-md-9">                    
                            <p class="form-control-static">{{$select->detail}}</p>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="control-label col-sm-3" for="address">ที่อยู่:</label>
                        <div class="col-md-9">                    
                            <p class="form-control-static">{{$select->address}}</p>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="control-label col-sm-3" for="address">เวลาเปิด:</label>
                        <div class="col-md-9">                    
                            <p class="form-control-static">{{$select->timeopen}}</p>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="control-label col-sm-3" for="address">เวลาปิด:</label>
                        <div class="col-md-9">                    
                            <p class="form-control-static">{{$select->timeclose}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-4">
                        <label class="control-label col-sm-6" for="location">ตำแหน่ง:</label>
                        <div class="col-md-6">
                            <div id="map-canvas" style="width:465px; height:250px;"></div>
                            <input type="hidden"  class="form-control input-sm" name="lat" id="lat">
                            <input type="hidden" class="form-control input-sm" name="lng" id="lng">
                        </div>
                    </div> 
                </div>
                </div>
            </div>
        </form>
        <hr>
{{-- ***STORE END*** --}}
{{-- ***FOOD MENU*** --}}
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">อาหาร
                    <small>จำนวนทั้งหมด({{$foods->total()}})</small>
                </h2>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
           @foreach ($foods as $i)
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="/uploads/foodpicture/{{$i->picturefood}}">
                </a>
                <h2>{{$i->namefood}}</h2>
                <p>{{$i->detail}}</p>
                <p><a class="btn btn-primary" href="/food/{{$i->id}}" role="button">ดูเพิ่มเติม &raquo;</a></p>
            </div>
            
           @endforeach
        </div>
        <!-- /.row -->
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                {{$foods->links()}}
            </div>
        </div>
        <!-- /.row -->
{{-- ***FOOD MENU END*** --}}
{{-- ***BLOGS*** --}}        
        <h2>ความคิดเห็น</h2>
        <hr>
        @if (Auth::guest())
            
        @else
            <h3>เพิ่มความคิดเห็น</h3>
            {!! Form::open(['action' => 'BlogController@store','class'=>'form-horizontal','enctype' => 'multipart/form-data','method' => 'POST']) !!}
            {{ Form::hidden('id_store',$select->id_store) }}
                <div class="form-group">              
                    {!! Form::label('comment','ความคิดเห็น',['class'=>'control-label col-md-2']) !!}
                    <div class="col-md-8">
                        {!! Form::text('comment',null,['class'=>'form-control']) !!}
                        {!! $errors->has('comment')?$errors->first('comment'):'' !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">  
                        {!! Form::submit('แสดงความคิดเห็น',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        @endif
        <h3>ความคิดเห็นที่มี</h3>
       
        <table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ความคิดเห็น</th>
                    <th>วันเวลาที่แสดงความคิดเห็น</th>
                    {{-- <th colspan="2" >Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if ($ctb > 0)
                    <?php
                        $count = 1;    
                    ?>
                    @foreach($blogs as $i)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->comment }}</td>
                            <td>{{ $i->created_at }}</td>
                        </tr>
                    @endforeach   
                @else
                    <tr>
                        <td colspan="4"><center>ไม่มีความคิดเห็น</center></td>
                    </tr>
                @endif
                
            </tbody>
        </table>
    </div>
{{-- ***END BLOGS*** --}}      

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
        draggable:false
    });
    // var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    // google.maps.event.addListener(searchBox,'places_changed',function(){
    //     var places = searchBox.getPlaces();
    //     var bounds = new google.maps.LatLngBound();
    //     var i,place;
    //     for(i=0; place=places[i];i++){
    //         bound.extend(place.geometry.location);
    //         maker,setPosition(place.geometry.location); //set marker position new...
    //     }
    //     map.fitBounds(bounds);
    //     map.setZoom(15);
    // });
    
    // google.maps.event.addListener(marker,'position_changed',function(){
    //     var lat = marker.getPosition().lat();
    //     var lng = marker.getPosition().lng();
    //     $('#lat').val(lat);
    //     $('#lng').val(lng);
    // });
</script>
@endsection

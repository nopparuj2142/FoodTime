@extends('layouts.app')

@section('content')
    

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

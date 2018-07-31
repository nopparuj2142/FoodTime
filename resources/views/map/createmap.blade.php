<style>
    #map-canvas{
        width:350px;
        height: 250px;
    }
</style>

<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2T2FtNWo3NZ4B-Yja6p2debY9JEFEC5I&libraries=places" type="text/javascript"></script>

<div class="container">
    <div class="col-sm-4">
        <h1>Add Position Map</h1>
        {{Form::open(['action'=>'LocationController@store','files'=>true,'method'=>'POST'])}}
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control input-sm" name="title">
        </div>
        <div class="form-group">
            <label for="">Map</label>
            <input type="text" id="searchmap">
            <div id="map-canvas"></div>
        </div>
        <div class="form-group">
            <label for="">Lat</label>
            <input type="text" class="form-control input-sm" name="lat" id="lat">
        </div>
        <div class="form-group">
            <label for="">Lng</label>
            <input type="text" class="form-control input-sm" name="lng" id="lng">
        </div>
        <button class="btn btn-sm btn-primary">Save</button>
        {{Form::close()}}
    </div>
</div>

<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat:15.24,
            lng:104.84
        },
        zoom:15
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
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>


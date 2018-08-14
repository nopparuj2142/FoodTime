<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>กิน อยู่ อุบล</title>
    
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}

    <!-- Latest compiled and minified JavaScript -->
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap1.min.css" rel="stylesheet">
    {{-- <link href="css/modern-business.css" rel="stylesheet"> --}}
    {{-- <link href="css/app.css" rel="stylesheet"> --}}
    <link href="css/slide.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    {{-- ใหม่ --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyA23pRj3Ff6w2SAOjyBMfQfcRhR_aHkZgY &libraries=places" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
 


</head>
<body>

    <?php 
        $Lat = 0;
        $Lng = 0;
            
    ?>
    {{-- <div class="slider-area">
            <div class="single-slider" style="background-image:url(img/bg/nungchill.jpg">
              
            </div>
        </div>
         --}}
        <div class="container3">
            <div class="bg1">
                  
                    @include('inc.navbar1')   
                    @yield('contentregis')  
                    
                    <div class="content">
                            <div class="principal3">
                            <a href="/about"> <img src="img/text5.png" style="width:579px; height:399px;"></a>
                            </div>
                    </div>
            </div>
        </div>
       
    @yield('script')
   
    
</body>

</html>
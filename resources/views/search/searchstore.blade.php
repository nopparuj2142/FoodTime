{{-- <!DOCTYPE html>
<html>
<head>
    <title>Live Search Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>ค้นหาร้านอาหาร</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="search" name="search" ></input>
                </div>
                <table class="table table-bordered table-hover">
                    {{-- <thead>
                        ...
                    </thead>
                    <tbody>
                        ...
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            // alert($value);
            $.ajax({
                type :'get',
                url  : '{{URL::to('search_get_store')}}',
                data : {'search':$value},
                success:function(data){
                    // console.log(data);
                    $('table').html(data);
                }
            });
        })
    </script>
@endsection
{{-- </body>
</html> --}}















{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search'Store</h1>
        <form action="{{url('getsearchstores')}}" method="get" id="formsearch" class="form-horizontal">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Name Store" id="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Search</button>
            </span>
        </div>
        </form>
        <div class="result">
            
        </div>
    </div>

    
@endsection
@section('script')
    <script type="text/javascript">
        $('search').on('keyup',function(){
            $value=$(this).val();
            alert('value');
            // e.preventDefault();
            // var url =$(this).attr('action');
            // var data = $(this).serializeArray();
            // var get =$(this).attr('method')
            // $.ajax({
            //     type : get,
            //     url : url,
            //     data : data
            // }).done(function(data){
            //     $('.result').html(data);
            // })
        })
    </script>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>ค้นหาอาหาร</h3>
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
                url  : '{{URL::to('search_get_food')}}',
                data : {'search':$value},
                success:function(data){
                    // console.log(data);
                    $('table').html(data);
                }
            });
        })
    </script>
@endsection
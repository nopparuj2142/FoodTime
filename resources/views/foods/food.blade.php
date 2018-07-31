@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($select as $food)
    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$food->namefood}}
                <a type="button" href="{{ route('stores.show',$food->id_store)}}" class="btn btn-link">{{$food->namestore}}</a>
                
                </h1>
            </div>
        </div>
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">                
                        <label class="control-label col-sm-2" for="typefood">ประเภทอาหาร:</label>
                        <div class="col-md-10">                    
                            <p class="form-control-static">{{$food->typename}}</p>
                        </div>
                    </div>
                    <div class="form-group">                
                        <label class="control-label col-sm-2" for="detail">รายละเอียด:</label>
                        <div class="col-md-10">                    
                            <p class="form-control-static">{{$food->detail}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-4">
                        <img src="/uploads/foodpicture/{{$food->picturefood}}" style="width:550px; height:350px; ">
                    </div> 
                </div>
                </div>
            </div>
        </form>
    @endforeach    
    </div>
@endsection

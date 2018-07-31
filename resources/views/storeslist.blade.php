@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ร้านอาหาร
                    <small>จำนวนทั้งหมด({{$storelist->total()}})</small>   <a class="btn btn-default" href="/searchstores" role="button">ค้นหา ?</a>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        @if ($ct > 0)
            <div class="row">
            @foreach ($storelist as $i)
                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="/uploads/profilestore/{{$i->profilestore}}">
                    </a>
                    <h2>{{$i->namestore}}</h2>
                    <p>{{$i->detail}}</p>
                <p><a class="btn btn-primary" href="{{ route('stores.show',$i->id_store)}}" role="button">ดูเพิ่มเติม &raquo;>
                </a></p>
                </div>
            @endforeach
            </div>
        @else
            <div class="row">
                <div class="portfolio-item">
                    <h2><center>ไม่พบข้อมูล</center></h2>
                </div>
            </div>
        @endif
        
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                {{$storelist->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection


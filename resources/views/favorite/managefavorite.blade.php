@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">รายการโปรดของฉัน
                    <small>จำนวนทั้งหมด({{$favoritelist->total()}})</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        @if ($ct > 0)
            <div class="row">
            @foreach ($favoritelist as $i)
                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="/uploads/profilestore/{{$i->profilestore}}">
                    </a>
                    <h2>{{$i->namestore}}</h2>
                    <p>{{$i->detail}}</p>
                    <p>
                        <a class="btn btn-primary" href="{{ route('stores.show',$i->id_store)}}" role="button">ดูเพิ่มเติม &raquo;</a>
                    </p>
                    {{-- <p>
                        <a class="btn btn-danger" href="{{ route('favorite.destroy',$i->id)}}" role="button">Unfavorite</a>
                    </p> --}}
                    
                            {!! Form::open(['method'=>'delete', 'route'=>['favorite.destroy',$i->id]])!!}
                            {!! Form::submit('นำออกจากรายการโปรด', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                </div>
            @endforeach
            </div>
        @else
             <div class="row">
                <div class="portfolio-item">
                    <h2><center>ไม่มีรายการโปรด</center></h2>
                </div>
            </div>
        @endif
        
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                {{$favoritelist->links()}}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection


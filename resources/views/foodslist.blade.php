@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        {{-- <div id="products" class="row list-group">
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            Product title</h4>
                        <p class="group inner list-group-item-text">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            Product title</h4>
                        <p class="group inner list-group-item-text">
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $21.000</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


            


        <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">อาหาร
                        <small>จำนวนทั้งหมด({{$foodlist->total()}})</small>   <a class="btn btn-default" href="/searchfood" role="button">ค้นหา ?</a>
                    </h1>
                </div>
            </div>
        <!-- /.row -->

        <!-- Projects Row -->
            @if ($s > 0)
                <div class="row">
            @foreach ($foodlist as $i)
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
            @else
                <div class="row">
                <div class="portfolio-item">
                    <h2><center>ไม่พบข้อมูล</center></h2>
                </div>
            </div>
            @endif
        <!-- /.row -->

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                {{$foodlist->links()}}
            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
@endsection


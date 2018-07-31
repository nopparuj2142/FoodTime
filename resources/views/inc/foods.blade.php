<!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">อาหาร
                    <small>จำนวนทั้งหมด({{$foods->total()}})</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        @if ($ct2 > 0)
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
                {{$foods->links()}}
            </div>
        </div>
        <!-- /.row -->
        <hr>

    </div>
    <!-- /.container -->
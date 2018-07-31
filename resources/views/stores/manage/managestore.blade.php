@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>จัดการร้านอาหาร</h1>
        <h2>ร้านที่รอการยืนยัน</h2>
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อร้าน</th>
                    <th>วันเวลาที่สร้าง</th>
                    <th>สถานะ</th>
                    <th colspan="3" >การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                @if ($ct1 > 0)
                    <?php
                        $count = 1;    
                    ?>
                    @foreach($rsto as $store)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td class="col-md-4">{{ $store->namestore }}</td>
                            <td>{{ $store->created_at }}</td>
                            @if ($store->status == 1)
                            <td class="bg-success">ได้รับการยืนยัน</td>
                            @else
                                <td class="bg-danger">ยังไม่ได้รับการยืนยัน</td>
                            @endif
                            <td>
                                <a class="btn btn-primary" href="{{ route('stores.show',$store->id_store)}}" role="button">ดูเพิ่มเติม</a>
                            </td>
                            <td>
                                <a href="/confirm_show/{{$store->id_store}}" class="btn btn-success">ยืนยัน</a>
                            </td>
                            <td>
                                <a href="/delete_show/{{$store->id_store}}" class="btn btn-danger">ลบ</a>
                            </td>
                            
                        </tr>
                    @endforeach  
                @else
                    <tr>
                    <td class="bg-success" colspan="7"><center>ไม่พบข้อมูล</center></td>
                </tr>
                @endif
                  
            </tbody>
        </table>

        <h2>ร้านอาหารที่ได้รับการยืนยัน</h2>
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อร้าน</th>
                    <th>วันเวลาที่สร้าง</th>
                    <th>สถานะ</th>
                    <th colspan="3" >การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                @if ($ct2 > 0)
                  <?php
                    $count2 = 1;    
                ?>
                @foreach($managestore as $store)
                    <tr>
                        <td>{{ $count2++ }}</td>
                        <td class="col-md-4">{{ $store->namestore }}</td>
                        <td>{{ $store->created_at }}</td>
                        
                        @if ($store->status == 1)
                        <td class="bg-success">ได้รับการยืนยัน</td>
                        @else
                            <td class="bg-danger">ยังไม่ได้รับการยืนยัน</td>
                        @endif
                        <td>
                            <a class="btn btn-primary" href="{{ route('stores.show',$store->id_store)}}" role="button">ดูเพิ่มเติม</a>
                        </td>
                        {{-- <td>
                            <a href="{{ route('stores.edit',$store->id)}}" class="btn btn-success">Edit</a>
                        </td> --}}
                        <td>
                            <a href="/sendmailshow/{{$store->id_store}}" class="btn btn-warning">ส่งข้อความถึงเจ้าของร้าน</a>
                        </td>
                        <td>
                            <a href="/delete_show/{{$store->id_store}}" class="btn btn-danger">ลบ</a>
                        </td>
                    </tr>
                @endforeach  
                @else
                    <tr>
                        <td class="bg-success" colspan="7"><center>ไม่พบร้านอาหาร</center></td>
                    </tr>
                @endif
                  
            </tbody>
        </table>
    </div>     
@endsection

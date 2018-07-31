@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ร้านอาหารของฉัน</h1>
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
                @if ($ct > 0)
                    <?php 
                        $count = 1;
                    ?>
                    @foreach($stores as $store)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $store->namestore }}</td>
                            <td>{{ $store->created_at }}</td>
                            @if ($store->status == 1)
                            <td class="bg-success">ได้รับการยืนยัน</td>
                            @else
                                <td class="bg-danger">ยังไม่ได้รับการยืนยัน</td>
                            @endif
                        
                            <td>
                                <a href="{{ route('stores.edit',$store->id_store)}}" class="btn btn-success">แก้ไข</a>
                            </td>
                            <td>
                                <a href="{{ route('myfoods.show',$store->id_store)}}" class="btn btn-warning">เมนูอาหาร</a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'delete', 'route'=>['stores.destroy',$store->id_store]])!!}
                                {!! Form::submit('ลบ', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            
                        </tr>
                    @endforeach   
                @else
                    <tr>
                        <td colspan="6"><center>ไม่พบข้อมูล</center></td>
                    </tr>
                @endif
             
            </tbody>
        </table>
        <a href="stores/create" class="btn btn-primary">สร้างใหม่</a>
    </div>     
@endsection

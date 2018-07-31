@extends('layouts.app')

@section('content')
   
    <div class="container">
        <h1>รายการอาหารของฉัน</h1>
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่ออาหาร</th>
                    <th>รายละเอียด</th>
                    <th>วันเวลาที่สร้าง</th>
                    <th colspan="2" >การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
             ?>
             @foreach($food as $i)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $i->namefood }}</td>
                    <td>{{ $i->detail }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <a href="{{ route('myfoods.edit',$i->id) }}" class="btn btn-success">แก้ไข</a>
                    </td>
                    
                    <td>
                        {!! Form::open(['method'=>'delete', 'route'=>['myfoods.destroy',$i->id,$id_store]])!!}
                        {!! Form::submit('ลบ', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    
                </tr>
            @endforeach  
            </tbody>
        </table>
        <a href="/create_food/{{$id_store}}" class="btn btn-primary">สร้างใหม่</a>
    </div>     
@endsection

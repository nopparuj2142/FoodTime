@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>จัดการประเภทร้านอาหาร</h1>
        
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อประเภทร้านอาหาร</th>
                    <th>วันเวลาที่สร้าง</th>
                    <th colspan="2" >การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
             ?>
             @foreach($typestore as $i)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $i->typename }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <a href="{{ route('typestore.edit',$i->id)}}" class="btn btn-success">แก้ไข</a>
                    </td>
                     <td>
                        {!! Form::open(['method'=>'delete', 'route'=>['typestore.destroy',$i->id]])!!}
                        {!! Form::submit('ลบ', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td> 
                    
                </tr>
            @endforeach  
            </tbody>
        </table>
        <a href="{{ route('typestore.create')}}" class="btn btn-primary">สร้างใหม่</a>
    </div><!-- /.container -->
@endsection
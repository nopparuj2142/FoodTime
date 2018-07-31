@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>จัดการประเภทอาหาร</h1>
        
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อประเภท</th>
                    <th>วันเวลาที่สร้าง</th>
                    <th colspan="2" >การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
             ?>
             @foreach($typefood as $i)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $i->typename }}</td>
                    <td>{{ $i->created_at }}</td>
                     <td>
                        <a href="{{ route('typefood.edit',$i->id)}}" class="btn btn-success">แก้ไข</a>
                    </td>
                    <td>
                        {!! Form::open(['method'=>'delete', 'route'=>['typefood.destroy',$i->id]])!!}
                        {!! Form::submit('ลบ', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td> 
                    
                </tr>
            @endforeach  
            </tbody>
        </table>
        <a href="{{ route('typefood.create')}}" class="btn btn-primary">สร้าง</a>
    </div><!-- /.container -->
@endsection
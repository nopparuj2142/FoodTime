@extends('layouts.app')

@section('content')
   
    <div class="container">
        <h1>ความคิดเห็นของฉัน</h1>
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อร้านอาหาร</th>
                    <th>ความคิดเห็น</th>
                    <th>วันเวลาที่แสดงความเห็น</th>
                    <th colspan="2" >ต้องการกระทำ</th>
                </tr>
            </thead>
            <tbody>
             
             @if ($s > 0)
             <?php
                $count = 1;
             ?>
             @foreach($blogs as $i)
                 <tr>
                    <td>{{ $count++}}</td>
                    <td>{{ $i->namestore }}</td>
                    <td>{{ $i->comment }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <a href="{{ route('blog.edit',$i->id) }}" class="btn btn-success">แก้ไข</a>
                    </td>
                    <td>
                        {!! Form::open(['method'=>'delete', 'route'=>['blog.destroy',$i->id]])!!}
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
        {{-- <a href="/create_food/{{$id_store}}" class="btn btn-primary">Create New</a> --}}
    </div>     
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Location</h1>
        
        <hr><table class="table table-bordered table-responsive" style="margin-top:10px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>lat</th>
                    <th>lng</th>
                    <th>Create at</th>
                    <th colspan="2" >Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($location as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->title }}</td>
                    <td>{{ $i->lat }}</td>
                    <td>{{ $i->lng }}</td>
                    <td>{{ $i->created_at }}</td>
                    {{-- <td>
                        <a href="{{ route('typestore.edit',$i->id)}}" class="btn btn-success">Edit</a>
                    </td>
                     <td>
                        {!! Form::open(['method'=>'delete', 'route'=>['typestore.destroy',$i->id]])!!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>  --}}
                    
                </tr>
            @endforeach  
            </tbody>
        </table>
        <a href="{{ route('location.create')}}" class="btn btn-primary">Create New</a>
    </div><!-- /.container -->
@endsection
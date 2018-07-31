@extends('layouts.app')

@section('content')
    
     <div class="form-group">
                            {!! Form::text('name', '',['class'=>'form-control','id'=>'searchItem','placeholder'=>'NameStore']) !!}
                        </div>
    <script>
        $( function() {
         
          $( "#searchItem" ).autocomplete({
            source: 'http://localhost:8000/searchname'
          });
        } );
        </script>
@endsection


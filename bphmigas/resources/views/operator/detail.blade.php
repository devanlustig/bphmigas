@extends('adminlte::page') 
@section('title', 'Operator Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Operator</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Operator Kapal: </b>{{$operator->nama_operator}}</li>
                    <li class="list-group-item"><b>Keterangan: </b>{{$operator->keterangan}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('operator.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('operator.edit', $operator->id_operator) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
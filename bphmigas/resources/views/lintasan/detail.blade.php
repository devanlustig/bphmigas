@extends('adminlte::page') 
@section('title', 'Lintasan Operasi') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Lintasan</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Lintasan: </b>{{$lintasan->lintasan_operasi}}</li>
                    <li class="list-group-item"><b>Keterangan: </b>{{$lintasan->keterangan}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('lintasan.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('lintasan.edit', $lintasan->id_lintasan_operasi) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
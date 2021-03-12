@extends('adminlte::page') 
@section('title', 'Pemilik Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Pemilik</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Pemilik Kapal: </b>{{$pemilik->nama_pemilik}}</li>
                    <li class="list-group-item"><b>Asosiasi Kapal: </b>{{$pemilik->asosiasi->asosiasi_kapal}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('pemilik.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('pemilik.edit', $pemilik->id_pemilik) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>

<a class="btn btn-danger btn-md" href="{{ url('/pemilik/exportpdfdetail', $pemilik->id_pemilik) }}">                   
<i class="fas fa-upload"></i> Export PDF </a>

<a href="{{ url('/pemilik/exportexceldetail', $pemilik->id_pemilik) }}" class="btn btn-success" target="_blank"><i class="fas fa-upload"></i> Export Excel</a> 

</div>
</div>
@stop
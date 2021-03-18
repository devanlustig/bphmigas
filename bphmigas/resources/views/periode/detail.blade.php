@extends('adminlte::page') 
@section('title', 'Periode') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Periode</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Periode: </b>{{$periode->nama_periode}}</li>
                    <li class="list-group-item"><b>Nomor: </b>{{$periode->nomor}}</li>
                    <li class="list-group-item"><b>Tahun: </b>{{$periode->tahun}}</li>
                    <li class="list-group-item"><b>Keterangan: </b>{{$periode->keterangan}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('periode.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('periode.edit', $periode->id_periode) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
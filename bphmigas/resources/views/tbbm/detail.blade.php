@extends('adminlte::page') 
@section('title', 'Tempat BBM') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Tempat BBM</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama Tempat: </b>{{$tbbm->nama_tbbm}}</li>
                    <li class="list-group-item"><b>Kabupaten: </b>{{$tbbm->id_kabupaten}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$tbbm->alamat}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('tbbm.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('tbbm.edit', $tbbm->id_tbbm) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
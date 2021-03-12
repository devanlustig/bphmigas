@extends('adminlte::page') 
@section('title', 'Asosiasi Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Asosisasi</h1> 
@stop @section('content')
<div class="row">         
<div class="col-12">  

    <div class="card">  
        <div class="card-body" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Asosiasi Kapal: </b>{{$asosiasikapal->asosiasi_kapal}}</li>
                    <li class="list-group-item"><b>Keterangan: </b>{{$asosiasikapal->keterangan}}</li>
                </ul>
        </div>
        <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('asosiasikapal.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('asosiasikapal.edit', $asosiasikapal->id) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop 
@section('plugins.Pace', true)
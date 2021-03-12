@extends('adminlte::page') 
@section('title', 'Realisasi Pengisian BBM') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Realisasi Pengisian BBM</h1> 
@stop @section('content')
<div class="row">         
    <div class="col-12">  

        <div class="card">  
            <div class="card-body" >
                <ul class="list-group list-group-flush">
                   <li class="list-group-item"><b>Nama Kapal: </b>{{$realisasipengisianbbm->kapal->nama_kapal}}</li>
                   <li class="list-group-item"><b>Tempat BBM: </b>{{$realisasipengisianbbm->tbbm->nama_tbbm}}</li>
                   <li class="list-group-item"><b>Periode: </b>{{$realisasipengisianbbm->id_periode}}</li>
                   <li class="list-group-item"><b>Tanggal Pengisian: </b>
                    <?php setlocale(LC_TIME, 'Id'); ?> {{$realisasipengisianbbm->tanggal_pengisian->formatLocalized("%A, %d %B %Y")}}</li>
                   <li class="list-group-item"><b>Jumlah: </b>{{$realisasipengisianbbm->jumlah_pengisian}}</li>
               </ul>
           </div>
           <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('realisasipengisianbbm.index') }}"> <i class="fas fa-arrow-left"></i></a>

            <a class="btn btn-info mt-3" href="{{ route('realisasipengisianbbm.edit', $realisasipengisianbbm->id_realisasi_pengisian_bbm) }}"><i class="fas fa-edit"></i></a> 
            
                      
        </div>  
    </div>


</div>
</div>
@stop
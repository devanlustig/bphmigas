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
                   <b> Foto Bukti : </b>
                   @if($realisasipengisianbbm->foto_bukti1)
                    <img id="original" src="{{ url($path.$realisasipengisianbbm->foto_bukti1) }}" height="70" width="70" data-toggle="modal" data-target="#myModal" style="cursor:pointer; margin-bottom: 10px;">
                    @else
                    --
                    @endif
               </ul>
           </div>
           <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('realisasipengisianbbm.index') }}"> <i class="fas fa-arrow-left"></i></a>

            <a class="btn btn-info mt-3" href="{{ route('realisasipengisianbbm.edit', $realisasipengisianbbm->id_realisasi_pengisian_bbm) }}"><i class="fas fa-edit"></i></a> 
            
                      
        </div>  
    </div>


</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <img width="100%" src="{{ url($path.$realisasipengisianbbm->foto_bukti1) }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop
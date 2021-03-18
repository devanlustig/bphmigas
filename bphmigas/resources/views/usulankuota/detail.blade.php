@extends('adminlte::page') 
@section('title', 'Detail Usulan Kuota') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Usulan Kuota</h1> 
@stop @section('content')
<div class="row">         
    <div class="col-12">  

        <div class="card">  
            <div class="card-body" >
                <div class="row">
                    <div class="col-6">
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item"><b>Nama Kapal: </b>{{$usulankuotaperperiode->kapal->nama_kapal }}</li>
                            <li class="list-group-item"><b>Nama TBBM: </b>{{$usulankuotaperperiode->tbbm->nama_tbbm}}</li>
                            <li class="list-group-item"><b>Periode: </b>{{$usulankuotaperperiode->periode->nama_periode}}</li>
                            <li class="list-group-item"><b>Lintasan Operasi: </b>{{$usulankuotaperperiode->lintasan->lintasan_operasi}}</li>
                           

                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-group list-group-flush">
                             <li class="list-group-item"><b>Kecepatan: </b>{{number_format($usulankuotaperperiode->kecepatan,3)}}</li>
                            <li class="list-group-item"><b>Jarak: </b>{{number_format($usulankuotaperperiode->jarak,3)}}</li>
                            <li class="list-group-item"><b>Jumlah Trip: </b>{{$usulankuotaperperiode->jumlah_trip}}</li>
                            <li class="list-group-item"><b>Kuota: </b>{{number_format($usulankuotaperperiode->kuota,5)}}</li>
                       </ul>
                   </div>
               </div>
           </div>
           <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('usulankuotaperperiode.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('usulankuotaperperiode.edit',$usulankuotaperperiode->id_usulan_kuota) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
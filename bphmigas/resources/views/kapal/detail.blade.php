@extends('adminlte::page') 
@section('title', 'Detail Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Detail Kapal</h1> 
@stop @section('content')
<div class="row">         
    <div class="col-12">  

        <div class="card">  
            <div class="card-body" >
                <div class="row">
                    <div class="col-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nama Kapal: </b>{{$kapal->nama_kapal}}</li>
                            <li class="list-group-item"><b>Operator: </b>{{$kapal->operator->nama_operator}}</li>
                            <li class="list-group-item"><b>Pemilik: </b>{{$kapal->pemilik->nama_pemilik}}</li>
                            <li class="list-group-item"><b>Tahun Pembuatan: </b>{{$kapal->tahun_pembuatan}}</li>
                            <li class="list-group-item"><b>GT: </b>{{$kapal->gt}}</li>

                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-group list-group-flush">

                           <li class="list-group-item"><b>DWT: </b>{{$kapal->dwt}}</li>
                           <li class="list-group-item"><b>Jumlah Mesin Induk: </b>{{$kapal->mesin_induk_jumlah}}</li>
                           <li class="list-group-item"><b>Daya Mesin Induk: </b>{{$kapal->mesin_induk_daya}}</li>
                           <li class="list-group-item"><b>Jumlah Mesin Bantu: </b>{{$kapal->mesin_bantu_jumlah}}</li>
                           <li class="list-group-item"><b>Daya Mesin Induk: </b>{{$kapal->mesin_bantu_daya}}</li>
                       </ul>
                   </div>
               </div>
           </div>
           <div class="card-header">                     
            <a class="btn btn-success mt-3" href="{{ route('kapal.index') }}"> <i class="fas fa-arrow-left"></i></a>
            
            <a class="btn btn-info mt-3" href="{{ route('kapal.edit', $kapal->id_kapal) }}"><i class="fas fa-edit"></i></a>               
        </div>  
    </div>


</div>
</div>
@stop
@extends('adminlte::page') 
@section('title', 'Pemilik Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Pemilik</h1> 
@stop @section('content')     
<div class="row">         
	<div class="col-12">             
		@if ($errors->any())             
		<div class="alert alert-warning alert-dismissible">                 
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                
			<h4><i class="icon fa fa-warning"></i> Perhatian!</h4>                 
			<ul>                     
				@foreach ($errors->all() as $error)                         
				<li>{{ $error }}</li>                     
				@endforeach                 
			</ul>             
		</div>            
		@endif
		<div class="card">                 

			<div class="card-body">                     
				<form method="post" class="form-horizontal" action="{{ route('pemilik.update', $pemilik->id_pemilik) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					<!-- @include('asosiasikapal.form') -->
					<div class="form-group">
						<label for="nama_pemilik">Pemilik Kapal</label>                    
						<input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" value="{{ $pemilik->nama_pemilik }}" aria-describedby="nama_pemilik" >                
					</div>

					<div class="form-group">
						<label for="id_asosiasi_kapal"> Asosiasi Kapal</label>

				<select class="form-control" name="id_asosiasi_kapal">
			      @foreach ($asosiasi as $key => $value)
			        <option value="{{ $key }}" {{ ( $key == $getasosiasiID) ? 'selected' : '' }}> 
								{{ $value }} 
					</option>
			      @endforeach
			    </select>
						
						
					</div>
					<!-- <div class="form-group">
						<label for="id_asosiasi_kapal">Asosiasi Kapal</label>                    
						<input type="text" name="id_asosiasi_kapal" class="form-control" id="id_asosiasi_kapal" value="{{ $pemilik->id_asosiasi_kapal }}" aria-describedby="id_asosiasi_kapal" >                
					</div> -->
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('pemilik.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop 
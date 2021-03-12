@extends('adminlte::page') 
@section('title', 'Tbbm') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Tbbm</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('tbbm.update', $tbbm->id_tbbm) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					
					<div class="form-group">
						<label for="nama_tbbm">Nama Tempat</label>                    
						<input type="text" name="nama_tbbm" class="form-control" id="nama_tbbm" value="{{ $tbbm->nama_tbbm }}" aria-describedby="nama_tbbm" >                
					</div>

					<div class="form-group">
						<label for="id_kabupaten">Kabupaten</label>                    
						<input type="text" name="id_kabupaten" class="form-control" id="id_kabupaten" value="{{ $tbbm->id_kabupaten }}" aria-describedby="id_kabupaten" >                
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>                    
						<input type="text" name="alamat" class="form-control" id="alamat" value="{{ $tbbm->alamat }}" aria-describedby="alamat" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('tbbm.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop
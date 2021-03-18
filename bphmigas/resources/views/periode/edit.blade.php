@extends('adminlte::page') 
@section('title', 'Asosiasi Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah periode</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('periode.update', $periode->id_periode) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					<div class="form-group">
						<label for="nama_periode">Nama Periode</label>                    
						<input type="text" name="nama_periode" class="form-control" id="nama_periode" value="{{ $periode->nama_periode }}" aria-describedby="nama_periode" >                
					</div>

					<div class="form-group">     
						<label for="nomor" class="col-sm-2 control-label">Nomor</label>     
						<div class="col-sm-10">         
							<input type="text" name="nomor" class="form-control" value="{{ $periode->nomor ?? ''  }}" >     
						</div> 
					</div>

					<div class="form-group">     
						<label for="tahun" class="col-sm-2 control-label">Tahun</label>     
						<div class="col-sm-10">         
							<input type="number" name="tahun" class="form-control" value="{{ $periode->tahun ?? ''  }}" >     
						</div> 
					</div>   

					<div class="form-group">
						<label for="keterangan">Keterangan</label>                    
						<input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $periode->keterangan }}" aria-describedby="keterangan" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('periode.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop
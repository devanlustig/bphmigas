@extends('adminlte::page') 
@section('title', 'Asosiasi Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Operator</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('operator.update', $operator->id_operator) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					<!-- @include('operator.form') -->
					<div class="form-group">
						<label for="nama_operator">Operator Kapal</label>                    
						<input type="text" name="nama_operator" class="form-control" id="nama_operator" value="{{ $operator->nama_operator }}" aria-describedby="nama_operator" >                
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>                    
						<input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $operator->keterangan }}" aria-describedby="keterangan" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('operator.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop
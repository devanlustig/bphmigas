@extends('adminlte::page') 
@section('title', 'Lintasan Operasi') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Lintasan</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('lintasan.update', $lintasan->id_lintasan_operasi) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					<!-- @include('lintasan.form') -->
					<div class="form-group">
						<label for="lintasan_operasi">Lintasan Operasi</label>                    
						<input type="text" name="lintasan_operasi" class="form-control" id="lintasan_operasi" value="{{ $lintasan->lintasan_operasi }}" aria-describedby="lintasan_operasi" >                
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>                    
						<input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $lintasan->keterangan }}" aria-describedby="keterangan" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('lintasan.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop
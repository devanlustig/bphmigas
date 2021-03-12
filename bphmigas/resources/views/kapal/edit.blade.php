@extends('adminlte::page') 
@section('title', 'Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Kapal</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('kapal.update', $kapal->id_kapal) }}" id="myForm" >
					@csrf                         
					@method('PUT')                         
					<div class="form-group">
						<label for="nama_kapal">Kapal</label>                    
						<input type="text" name="nama_kapal" class="form-control" id="nama_kapal" value="{{ $kapal->nama_kapal }}" aria-describedby="nama_kapal" >                
					</div>

					<div class="form-group">
						<label for="id_pemilik"> Pemilik</label>
						<select class="form-control" name="id_pemilik">
							@foreach ($pemilik as $keypemilik => $valuepemilik)
							<option value="{{ $keypemilik }}" {{ ( $keypemilik == $getpemilikID) ? 'selected' : '' }}> 
								{{ $valuepemilik }}
							</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="id_operator"> Operator</label>
						<select class="form-control" name="id_operator">
							@foreach ($operator as $key => $value)
							<option value="{{ $key }}" {{ ( $key == $getoperatorID) ? 'selected' : '' }}> 
								{{ $value }} 
							</option>
							@endforeach
						</select>
					</div>

					

					<div class="form-group">
						<label for="tahun_pembuatan">Tahun Pembuatan</label>                    
						<input type="text" name="tahun_pembuatan" class="form-control" id="tahun_pembuatan" value="{{ $kapal->tahun_pembuatan }}" aria-describedby="tahun_pembuatan" >                
					</div>

					<div class="form-group">
						<label for="gt">GT</label>                    
						<input type="text" name="gt" class="form-control" id="gt" value="{{ $kapal->gt }}" aria-describedby="gt" >                
					</div>

					<div class="form-group">
						<label for="dwt">DWT</label>                    
						<input type="text" name="dwt" class="form-control" id="dwt" value="{{ $kapal->dwt }}" aria-describedby="dwt" >                
					</div>

					<div class="form-group">
						<label for="mesin_induk_jumlah">Jumlah Mesin Induk</label>                    
						<input type="text" name="mesin_induk_jumlah" class="form-control" id="mesin_induk_jumlah" value="{{ $kapal->mesin_induk_jumlah }}" aria-describedby="mesin_induk_jumlah" >                
					</div>

					<div class="form-group">
						<label for="mesin_induk_daya">Daya Mesin Induk</label>                    
						<input type="text" name="mesin_induk_daya" class="form-control" id="mesin_induk_daya" value="{{ $kapal->mesin_induk_daya }}" aria-describedby="dwt" >                
					</div>

					<div class="form-group">
						<label for="mesin_bantu_jumlah">Jumlah Mesin Bantu</label>                    
						<input type="text" name="mesin_bantu_jumlah" class="form-control" id="mesin_bantu_jumlah" value="{{ $kapal->mesin_bantu_jumlah }}" aria-describedby="mesin_bantu_jumlah" >                
					</div>

					<div class="form-group">
						<label for="mesin_bantu_daya">Daya Mesin Bantu</label>                    
						<input type="text" name="mesin_bantu_daya" class="form-control" id="mesin_bantu_daya" value="{{ $kapal->mesin_bantu_daya }}" aria-describedby="mesin_bantu_daya" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('kapal.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
			</div>             
		</div>         
	</div>     
</div> 
@stop 
@section('plugins.Pace', true)
@extends('adminlte::page') 
@section('title', 'Usulan Kuota') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Usulan Kuota</h1> 
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
				<form method="post" class="form-horizontal" action="{{ route('usulankuotaperperiode.update', $usulankuotaperperiode->id_kapal) }}" id="myForm" >
					@csrf                         
					@method('PUT')

					<div class="form-group">
						<label for="id_kapal"> Nama Kapal</label>
						<select class="form-control" name="id_kapal">
							@foreach ($kapal as $keykapal => $valuekapal)
							<option value="{{ $keykapal }}" {{ ( $keykapal == $getkapalID) ? 'selected' : '' }}> 
								{{ $valuekapal }}
							</option>
							@endforeach
						</select>
					</div>                         
				

					<div class="form-group">
						<label for="id_tbbm"> Nama TBBM</label>
						<select class="form-control" name="id_tbbm">
							@foreach ($tbbm as $keytbbm => $valuetbbm)
							<option value="{{ $keytbbm }}" {{ ( $keytbbm == $gettbbmID) ? 'selected' : '' }}> 
								{{ $valuetbbm }}
							</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="id_periode"> Periode</label>
						<select class="form-control" name="id_periode">
							@foreach ($periode as $key => $value)
							<option value="{{ $key }}" {{ ( $key == $getperiodeID) ? 'selected' : '' }}> 
								{{ $value }} 
							</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="id_lintasan_operasi"> Lintasan Operasi</label>
						<select class="form-control" name="id_lintasan_operasi">
							@foreach ($lintasan as $keylintasan => $valuelintasan)
							<option value="{{ $keylintasan }}" {{ ( $keylintasan == $getlintasanID) ? 'selected' : '' }}> 
								{{ $valuelintasan }} 
							</option>
							@endforeach
						</select>
					</div>


					<div class="form-group">
						<label for="kecepatan">Kecepatan</label>                    
						<input type="text" name="kecepatan" class="form-control" id="kecepatan" value="{{ $usulankuotaperperiode->kecepatan }}" aria-describedby="kecepatan" >                
					</div>

					<div class="form-group">
						<label for="jarak">Jarak</label>                    
						<input type="text" name="jarak" class="form-control" id="jarak" value="{{ $usulankuotaperperiode->jarak }}" aria-describedby="jarak" >                
					</div>

					<div class="form-group">
						<label for="jumlah_trip">Jumlah Trip</label>                    
						<input type="text" name="jumlah_trip" class="form-control" id="jumlah_trip" value="{{ $usulankuotaperperiode->jumlah_trip }}" aria-describedby="jumlah_trip" >                
					</div>

					<div class="form-group">
						<label for="kuota">Kuota</label>                    
						<input type="text" name="kuota" class="form-control" id="kuota" value="{{ $usulankuotaperperiode->kuota }}" aria-describedby="kuota" >                
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('usulankuotaperperiode.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
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
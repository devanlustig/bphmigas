@extends('adminlte::page') 
@section('title', 'Realisasi Pengisian Bbm') 
@section('content_header')     
<h1 class="m-0 text-dark">Ubah Realisasi Pengisian BBM</h1> 
@stop 
@section('content')     
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
				<form method="post" class="form-horizontal" action="{{ route('realisasipengisianbbm.update', $realisasipengisianbbm->id_realisasi_pengisian_bbm) }}" id="myForm" >
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
						<label for="id_tbbm"> Nama Tempat </label>
						<select class="form-control" name="id_tbbm">
							@foreach ($tbbm as $keytbbm => $valuetbbm)
							<option value="{{ $keytbbm }}" {{ ( $keytbbm == $gettbbmID) ? 'selected' : '' }}> 
								{{ $valuetbbm }}
							</option>
							@endforeach
						</select>
					</div>

					

					<div class="form-group">     
						<label for="id_periode" class="col-sm-2 control-label">Periode</label>     
						<div class="col-sm-10">         
							<input type="text" name="id_periode" class="form-control" value="{{ $realisasipengisianbbm->id_periode ?? ''  }}" >     
						</div> 
					</div> 

					<div class="form-group">     
						<label for="tanggal_pengisian" class="col-sm-2 control-label">Tanggal Pengisian</label>     
						<div class="col-sm-3">         
							<input type="text" name="tanggal_pengisian" id="tgl"  class="form-control" value="{{ $realisasipengisianbbm->tanggal_pengisian ?? '' }}" >     
						</div> 
					</div> 


					<div class="form-group">     
						<label for="jumlah_pengisian" class="col-sm-2 control-label">Jumlah</label>     
						<div class="col-sm-10">         
							<input type="text" name="jumlah_pengisian" class="form-control" value="{{ $realisasipengisianbbm->jumlah_pengisian ?? ''  }}" >     
						</div> 
					</div> 

					<div class="form-group">
						<label for="foto_bukti1" class="col-sm-2 control-label">Upload Bukti</label>
						@if($realisasipengisianbbm->foto_bukti1)
						<img id="original" src="{{ url($path.$realisasipengisianbbm->foto_bukti1) }}" height="70" width="70" data-toggle="modal" data-target="#myModal" style="cursor:pointer; margin-bottom: 10px;">
						@endif
						<input type="file" name="foto_bukti1" class="form-control" value="{{ $$realisasipengisianbbm->foto_bukti1 ?? ''  }}"">
					</div>
					
					<div class="form-group">     
						<div class="col-sm-offset-2 col-sm-10">         
							<a href="{{ route('realisasipengisianbbm.index') }}" class="btn btn-success" role="button"> <i class="fas fa-arrow-left"></i> Batal</a>    
							<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan </button> 
						</div> 
					</div>

				</form>                 
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
@section('plugins.DateRangePicker', true) 
@section('js')     
<script type="text/javascript">         
	$("#tgl").daterangepicker({             
		autoclose: true,             
		todayBtn: true,             
		timePicker: true,             
		singleDatePicker: true,             
		locale: {               
			format: 'Y/MM/DD HH:mm:ss'             
		}         
	});     
</script> 
@stop
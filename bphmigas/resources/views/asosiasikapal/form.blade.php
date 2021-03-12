{{ csrf_field() }} 
<div class="form-group">     
	<label for="asosiasi_kapal" class="col-sm-2 control-label">Nama Asosiasi</label>     
	<div class="col-sm-10">         
		<input type="text" name="asosiasi_kapal" class="form-control" value="{{ $asosiasi_kapal ?? ''  }}" >     
	</div> 
</div> 

	<div class="form-group">     
		<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>     
		<div class="col-sm-10">         
			<input type="text" name="keterangan" class="form-control" value="{{ $keterangan ?? '' }}" >     
		</div> 
	</div> 
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('asosiasikapal.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
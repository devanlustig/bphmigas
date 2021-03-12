{{ csrf_field() }} 
<div class="form-group">     
	<label for="nama_kapal" class="col-sm-2 control-label">Nama Kapal</label>     
	<div class="col-sm-10">         
		<input type="text" name="nama_kapal" class="form-control" value="{{ $nama_kapal ?? ''  }}" >     
	</div> 
</div> 

	<div class="form-group">
    <label for="id_operator" class="col-sm-2 control-label">Operator</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_operator">
    	<option> -- Pilih -- </option>
      @foreach($operator as $item)
        <option value="{{ $item->id_operator }}">{{$item->nama_operator}}</option>
      @endforeach
    </select>
</div>
  </div>

  <div class="form-group">
    <label for="id_pemilik" class="col-sm-2 control-label">Pemilik</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_pemilik">
    	<option> -- Pilih -- </option>
      @foreach($pemilik as $item)
        <option value="{{ $item->id_pemilik }}">{{$item->nama_pemilik}}</option>
      @endforeach
    </select>
</div>
  </div>

	<div class="form-group">     
		<label for="gt" class="col-sm-2 control-label">GT</label>     
		<div class="col-sm-10">         
			<input type="text" name="gt" class="form-control" value="{{ $gt ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="dwt" class="col-sm-2 control-label">DWT</label>     
		<div class="col-sm-10">         
			<input type="text" name="dwt" class="form-control" value="{{ $dwt ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="tahun_pembuatan" class="col-sm-2 control-label">Tahun Pembuatan</label>     
		<div class="col-sm-10">         
			<input type="text" name="tahun_pembuatan" class="form-control" value="{{ $tahun_pembuatan ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="mesin_induk_jumlah" class="col-sm-2 control-label">Jumlah Mesin Induk</label>     
		<div class="col-sm-10">         
			<input type="text" name="mesin_induk_jumlah" class="form-control" value="{{ $mesin_induk_jumlah ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="mesin_induk_daya" class="col-sm-2 control-label">Daya Mesin Induk</label>     
		<div class="col-sm-10">         
			<input type="text" name="mesin_induk_daya" class="form-control" value="{{ $mesin_induk_daya ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="mesin_bantu_jumlah" class="col-sm-2 control-label">Jumlah Mesin Bantu</label>     
		<div class="col-sm-10">         
			<input type="text" name="mesin_bantu_jumlah" class="form-control" value="{{ $mesin_bantu_jumlah ?? '' }}" >     
		</div> 
	</div> 

	<div class="form-group">     
		<label for="mesin_bantu_daya" class="col-sm-2 control-label">Daya Mesin Bantu</label>     
		<div class="col-sm-10">         
			<input type="text" name="mesin_bantu_daya" class="form-control" value="{{ $mesin_bantu_daya ?? '' }}" >     
		</div> 
	</div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('kapal.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
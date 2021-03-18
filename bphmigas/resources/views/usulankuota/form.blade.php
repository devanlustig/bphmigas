{{ csrf_field() }} 

<div class="form-group">
    <label for="id_kapal" class="col-sm-2 control-label">Nama Kapal</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_kapal">
    	<option> -- Pilih -- </option>
      @foreach($kapal as $item)
        <option value="{{ $item->id_kapal }}">{{$item->nama_kapal}}</option>
      @endforeach
    </select>
</div>
  </div>

	<div class="form-group">
    <label for="id_tbbm" class="col-sm-2 control-label">Nama TBBM</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_tbbm">
    	<option> -- Pilih -- </option>
      @foreach($tbbm as $item)
        <option value="{{ $item->id_tbbm }}">{{$item->nama_tbbm}}</option>
      @endforeach
    </select>
</div>
  </div>

  <div class="form-group">
    <label for="id_periode" class="col-sm-2 control-label">Periode</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_periode">
    	<option> -- Pilih -- </option>
      @foreach($periode as $item)
        <option value="{{ $item->id_periode }}">{{$item->nama_periode}}</option>
      @endforeach
    </select>
</div>
  </div>

   <div class="form-group">
    <label for="id_lintasan_operasi" class="col-sm-2 control-label">Lintasan Operasi</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_lintasan_operasi">
    	<option> -- Pilih -- </option>
      @foreach($lintasan as $item)
        <option value="{{ $item->id_lintasan_operasi }}">{{$item->lintasan_operasi}}</option>
      @endforeach
    </select>
</div>
  </div>

	<div class="form-group">     
		<label for="kecepatan" class="col-sm-2 control-label">Kecepatan</label>     
		<div class="col-sm-10">         
			<input type="text" name="kecepatan" class="form-control" value="{{ $kecepatan ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="jarak" class="col-sm-2 control-label">Jarak</label>     
		<div class="col-sm-10">         
			<input type="text" name="jarak" class="form-control" value="{{ $jarak ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="jumlah_trip" class="col-sm-2 control-label">Jumlah Trip</label>     
		<div class="col-sm-10">         
			<input type="text" name="jumlah_trip" class="form-control" value="{{ $jumlah_trip ?? '' }}" >     
		</div> 
	</div>

	<div class="form-group">     
		<label for="kuota" class="col-sm-2 control-label">Kuota</label>     
		<div class="col-sm-10">         
			<input type="text" name="kuota" class="form-control" value="{{ $kuota ?? '' }}" >     
		</div> 
	</div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('usulankuotaperperiode.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
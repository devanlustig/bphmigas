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
    <label for="id_tbbm" class="col-sm-2 control-label">Tempat Pengisian BBM</label>
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
  <label for="tanggal_pengisian" class="col-sm-2 control-label">Tanggal Pengisian</label>     
  <div class="col-sm-3">         
    <input type="text" name="tanggal_pengisian" id="tgl"  class="form-control" value="{{ $tanggal_pengisian ?? '' }}" >     
  </div> 
</div> 


	<div class="form-group">     
	<label for="jumlah_pengisian" class="col-sm-2 control-label">Jumlah</label>     
	<div class="col-sm-3">         
		<input type="text" name="jumlah_pengisian" class="form-control" value="{{ $jumlah_pengisian ?? ''  }}" >     
	</div> 
</div> 

<div class="form-group">
<label for="foto_bukti1" class="col-sm-2 control-label">Upload Bukti</label>
<div class="col-sm-3">   
<input type="file" name="foto_bukti1" class="form-control">
</div>
</div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('realisasipengisianbbm.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
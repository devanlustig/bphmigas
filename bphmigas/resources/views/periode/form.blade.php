{{ csrf_field() }} 
<div class="form-group">     
	<label for="nama_periode" class="col-sm-2 control-label">Nama Periode</label>     
	<div class="col-sm-10">         
		<input type="text" name="nama_periode" class="form-control" value="{{ $nama_periode ?? ''  }}" >     
	</div> 
</div>

<div class="form-group">     
	<label for="nomor" class="col-sm-2 control-label">Nomor</label>     
	<div class="col-sm-10">         
		<input type="text" name="nomor" class="form-control" value="{{ $nomor ?? ''  }}" >     
	</div> 
</div>

<div class="form-group">     
	<label for="tahun" class="col-sm-2 control-label">Tahun</label>     
	<div class="col-sm-10">         
		<input type="number" name="tahun" class="form-control" value="{{ $tahun ?? ''  }}" >     
	</div> 
</div>    


	<div class="form-group">
            {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('keterangan', $value = null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('periode.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
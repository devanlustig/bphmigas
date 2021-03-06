{{ csrf_field() }} 
<div class="form-group">     
	<label for="nama_operator" class="col-sm-2 control-label">Nama Operator</label>     
	<div class="col-sm-10">         
		<input type="text" name="nama_operator" class="form-control" value="{{ $nama_operator ?? ''  }}" >     
	</div> 
</div> 

	<!-- <div class="form-group">     
		<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>     
		<div class="col-sm-10">         
			<input type="text" name="keterangan" class="form-control" value="{{ $keterangan ?? '' }}" >     
		</div> 
	</div>  -->

	<div class="form-group">
            {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('keterangan', $value = null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('operator.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
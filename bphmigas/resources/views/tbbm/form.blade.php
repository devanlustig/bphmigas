{{ csrf_field() }} 
<div class="form-group">     
	<label for="nama_tbbm" class="col-sm-2 control-label">Nama Tempat</label>     
	<div class="col-sm-10">         
		<input type="text" name="nama_tbbm" class="form-control" value="{{ $nama_tbbm ?? ''  }}" >     
	</div> 
</div> 

<div class="form-group">     
	
	{!! Form::label('id_kabupaten', 'Kabupaten', ['class' => 'col-sm-2 control-label']) !!}   
	<div class="col-sm-10">  
	{!! Form::text('id_kabupaten', '', ['class' => 'form-control']) !!}          
	</div> 
</div>

	<div class="form-group">
            {!! Form::label('alamat', 'Alamat', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('alamat', $value = null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">         
			<a href="{{ route('tbbm.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
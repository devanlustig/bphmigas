{{ csrf_field() }} 
<div class="form-group">     
	<label for="lintasan_operasi" class="col-sm-2 control-label">Lintasan Operasi</label>     
	<div class="col-sm-10">         
		<input type="text" name="lintasan_operasi" class="form-control" value="{{ $lintasan_operasi ?? ''  }}" >     
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
			<a href="{{ route('lintasan.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
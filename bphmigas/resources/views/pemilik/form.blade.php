{{ csrf_field() }} 
<div class="form-group">     
	<!-- <label for="nama_pemilik" class="col-sm-2 control-label">Nama Pemilik</label>   -->
	{!! Form::label('nama_pemilik', 'Nama Pemilik', ['class' => 'col-sm-2 control-label']) !!}   
	<div class="col-sm-10">  
	{!! Form::text('nama_pemilik', '', ['class' => 'form-control']) !!}          
	<!-- <input type="text" name="nama_pemilik" class="form-control" value="{{ $nama_pemilik ?? ''  }}" >   -->   
	</div> 
</div> 

<div class="form-group">
    <label for="id_asosiasi_kapal" class="col-sm-2 control-label"> Asosiasi Kapal</label>
    <div class="col-sm-10">
    <select class="form-control" name="id_asosiasi_kapal">
      @foreach($asosiasi as $item)
        <option value="{{ $item->id }}">{{$item->asosiasi_kapal}}</option>
      @endforeach
    </select>
</div>
  </div>
	
	<div class="form-group">     
		<div class="col-sm-offset-2 col-sm-10">         
			<!-- <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan"> -->
			{!! Form::submit('Simpan', ['class' => 'btn btn-success btn-md']) !!}         
			<a href="{{ route('pemilik.index') }}" class="btn btn-primary" role="button">Batal</a>     
		</div> 
	</div>
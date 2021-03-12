@extends('adminlte::page') 
@section('title', 'Pemilik') 
@section('content_header')     
<h1 class="m-0 text-dark">Manage Pemilik</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('pemilik.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a>

				<a class="btn btn-danger btn-md" href="{{ url('/pemilik/exportpdf') }}">                   
					<i class="fas fa-upload"></i> Export PDF                 
				</a>

				<a href="{{ url('/pemilik/exportexcel') }}" class="btn btn-success" target="_blank"><i class="fas fa-upload"></i> Export Excel</a>   
				
				<div style="float:right;">

				<form class="form-inline" action="{{ url('cari') }}" method="GET" role="cari">
					<button class="btn btn-primary" style="margin-right: 5px; display: none;" onClick="window.location.reload();"><span class="fas fa-sync"></span></button>
					{{ csrf_field() }}
					<input class="form-control" style="margin-right: 5px;" type="text" name="q" placeholder="Cari Data Pemilik ...">
					<button class="btn btn-info" type="submit" title="CARI">
                                <span class="fas fa-search"></span>
                            </button>
				</form>
				</div>               
			</div>

			<div class="card-body">                     
				<table class="table table-bordered table-responsive">                         
					<thead>                             
						<tr>                                 
							<th style="width: 20px">#</th>                                 
							<th>@sortablelink('nama_pemilik', 'Nama Pemilik')</th>                                
							<th>@sortablelink('id_asosiasi_kapal', 'Asosiasi Kapal')</th>            
							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($pemilik->count())                            
						@foreach ($pemilik as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->nama_pemilik }}                                 
							</td>                                 
							<td> 
								{{ @$item->asosiasi->asosiasi_kapal }}
							</td>                                 
							<td>
								<form action="{{ route('pemilik.destroy', $item->id_pemilik) }}" method="POST">
									
									<a class="btn btn-success" href="{{ route('pemilik.show',$item->id_pemilik) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('pemilik.edit',$item->id_pemilik) }}"> <i class="fas fa-edit"></i></a>

									@csrf
									@method('DELETE')

									<button type="submit" title="delete" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menghapus ?')">
										<i class="fas fa-trash"></i></button>

									</form>                            
								</td>
							</tr>  
							<?php $no++;?>                           

							@endforeach
							@endif                        
						</tbody>                     
					</table>                 
				</div>

				<div class="card-footer clearfix text-right">                     
					<!-- {{ $pemilik->links() }} -->
					{!! $pemilik->appends(Request::except('page'))->render() !!}   
					
				</div>          
			</div>         
		</div>     
	</div> 

	@stop 
	@section('plugins.Sweetalert2', true) 
	<!-- ('plugins.Pace', true) --> 
	@section('js')     
	@if (session('success'))         
	<script type="text/javascript">              
		Swal.fire(                   
			'Sukses!',                   
			'{{ session('success') }}',                   
			'success'             
			)         
		</script>     
		@endif 
		@stop
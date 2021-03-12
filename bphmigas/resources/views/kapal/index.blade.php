@extends('adminlte::page') 
@section('title', 'Kapal') 
@section('content_header')    
<h1 class="m-0 text-dark">Manage  Kapal</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('kapal.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a>                 
			</div>

			<div class="card-body">                     
				<table class="table table-bordered table-responsive">                         
					<thead>                             
						<tr>                                 
							<th style="width: 20px">#</th>                                 
							<th>@sortablelink('nama_kapal', 'Nama Kapal')</th>
							<th>@sortablelink('id_operator', 'Operator')</th>  
							<th>@sortablelink('id_pemilik', 'Pemilik')</th>  
							<th>@sortablelink('tahun_pembuatan', 'Tahun Pembuatan')</th>  
							<th>@sortablelink('gt', 'GT')</th>  
							<th>@sortablelink('dwt', 'DWT')</th>  
							<th>@sortablelink('mesin_induk_jumlah', 'Jumlah Mesin Induk')</th>  
							<th>@sortablelink('mesin_induk_daya', 'Daya Mesin Induk')</th>  
							<th>@sortablelink('mesin_bantu_jumlah', 'Jumlah Mesin Bantu')</th>
							<th>@sortablelink('mesin_bantu_daya', 'Daya Mesin Bantu')</th>

							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($kapal->count())                            
						@foreach ($kapal as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->nama_kapal }}                                 
							</td>

							<td>                                     
								{{ $item->operator->nama_operator }}                                 
							</td>  

							<td> 
								{{ $item->pemilik->nama_pemilik }}                   
							</td>

							<td>                                     
								{{ $item->tahun_pembuatan }}                                 
							</td> 

							<td>
								{{ number_format($item->gt, 3) }}
								                       
							</td> 

							<td>                                     
								{{ number_format($item->dwt, 3) }}                                 
							</td> 

							<td>                                     
								{{ $item->mesin_induk_jumlah }}                                 
							</td> 

							<td>                                     
								{{ $item->mesin_induk_daya }}                                 
							</td> 

							<td>                                     
								{{ $item->mesin_bantu_jumlah }}                                 
							</td> 

							<td>                                     
								{{ $item->mesin_bantu_daya }}                                 
							</td> 

							

							<td>
								<form action="{{ route('kapal.destroy', $item->id_kapal) }}" method="POST">
									
									<a class="btn btn-success" href="{{ route('kapal.show',$item->id_kapal) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('kapal.edit',$item->id_kapal) }}"> <i class="fas fa-edit"></i></a>

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
					<!-- {{ $kapal->links() }} -->
					{!! $kapal->appends(Request::except('page'))->render() !!}   
				</div>             
			</div>         
		</div>     
	</div> 

	@stop 
	@section('plugins.Sweetalert2', true) 
	<!-- ('plugins.Pace', true)  -->
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
@extends('adminlte::page') 
@section('title', 'Realisasi Pengisian BBM') 
@section('content_header')     
<h1 class="m-0 text-dark">Realisasi Pengisian BBM</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('realisasipengisianbbm.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a>  

				<div style="float:right;">
					<form class="form-inline" action="{{ url('caripengisian') }}" method="GET" role="caripengisian">
						{{ csrf_field() }}
						<input class="form-control" style="margin-right: 5px;" type="text" name="q" placeholder="Cari Data Realisasi Pengisian ...">
						<button class="btn btn-info" type="submit" title="CARI">
							<span class="fas fa-search"></span>
						</button>
					</form>
				</div>  

			</div>

			<!-- @if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif   -->

			<div class="card-body table-responsive">                     
				<table class="table table-bordered">                         
					<thead class="thead-light">                             
						<tr>                                 
							<th style="width: 20px">#</th>                                 
							<th>@sortablelink('id_kapal', 'Nama Kapal')</th>
							<th>@sortablelink('id_tbbm', 'Tempat BBM')</th>
							<th>@sortablelink('id_periode', 'Periode')</th>
							<th>@sortablelink('tanggal_pengisian', 'Tanggal')</th>
							<th> Jumlah</th>                                    
							<th>Foto Bukti</th>                                 
							<th>Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($realisasipengisianbbm->count())                            
						@foreach ($realisasipengisianbbm as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ @$item->kapal->nama_kapal }}                                 
							</td>                                 
							<td>                                     
								{{ $item->tbbm->nama_tbbm }}                                 
							</td>
							<td>                                     
								{{ $item->id_periode }}                                 
							</td>  
							<td> 
								<?php setlocale(LC_TIME, 'Id'); ?>                     
								{{ $item->tanggal_pengisian->formatLocalized("%A, %d %B %Y") }}                                 
							</td>  
							<td>                                     
								{{ $item->jumlah_pengisian }}                                 
							</td>
							<td>
								@if($item->foto_bukti1 == null)
								-- 
								@else
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Lihat Bukti</button>

								@endif                          
							</td>                                     
							<td class="text-center">
								<form action="{{ route('realisasipengisianbbm.destroy', $item->id_realisasi_pengisian_bbm) }}" method="POST">
									

									@if(Auth::user()->hak_akses != "admin")

									<a class="btn btn-success" href="{{ route('realisasipengisianbbm.show',$item->id_realisasi_pengisian_bbm) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('realisasipengisianbbm.edit',$item->id_realisasi_pengisian_bbm) }}"> <i class="fas fa-edit"></i></a>

									@else

									<a class="btn btn-success" href="{{ route('realisasipengisianbbm.show',$item->id_realisasi_pengisian_bbm) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('realisasipengisianbbm.edit',$item->id_realisasi_pengisian_bbm) }}"> <i class="fas fa-edit"></i></a>

									@csrf
									@method('DELETE')

									<button type="submit" title="delete" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menghapus ?')">
										<i class="fas fa-trash"></i></button>
										@endif

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
					<!-- {{ $realisasipengisianbbm->links() }} -->
					{!! $realisasipengisianbbm->appends(Request::except('page'))->render() !!}   
				</div>             
			</div>         
		</div>     
	</div> 


	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<img width="100%" src="{{ url($path.$item->foto_bukti1) }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	@stop 
	@section('plugins.Sweetalert2', true)
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
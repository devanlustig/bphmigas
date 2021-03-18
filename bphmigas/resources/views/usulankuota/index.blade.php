@extends('adminlte::page') 
@section('title', 'Usulan Kuota') 
@section('content_header')    
<h1 class="m-0 text-dark">Manage  Usulan Kuota</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('usulankuotaperperiode.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a> 

				<div style="float:right;">

				<form class="form-inline" action="{{ url('cariusulan') }}" method="GET" role="cari">
					<button class="btn btn-primary" style="margin-right: 5px; display: none;" onClick="window.location.reload();"><span class="fas fa-sync"></span></button>
					{{ csrf_field() }}
					<input class="form-control" style="margin-right: 5px;" type="text" name="q" placeholder="Cari Data Usulan Kuota ...">
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
							<th>@sortablelink('id_kapal', 'Nama Kapal')</th>  
							<th>@sortablelink('id_tbbm', 'Nama TBBM')</th>  
							<th>@sortablelink('id_periode', 'Periode')</th>  
							<th>@sortablelink('id_lintasan_operasi', 'Lintasan Operasi')</th>  
							<th>@sortablelink('kecepatan', 'Kecepatan')</th>  
							<th>@sortablelink('jarak', 'Jarak')</th>  
							<th>@sortablelink('jumlah_trip', 'Jumlah Trip')</th>  
							<th>@sortablelink('kuota', 'Kuota')</th>

							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($usulankuotaperperiode->count())                            
						@foreach ($usulankuotaperperiode as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->kapal->nama_kapal }}                                 
							</td>

							<td>                                     
								{{ $item->tbbm->nama_tbbm }}                                 
							</td>  

							<td> 
								{{ $item->periode->nama_periode }}                   
							</td>

							<td>                                     
								{{ $item->lintasan->lintasan_operasi }}                                 
							</td> 

							<td>
								{{ number_format($item->kecepatan, 3) }}
								                       
							</td> 

							<td>                                     
								{{ number_format($item->jarak, 3) }}                                 
							</td> 

							<td>                                     
								{{ $item->jumlah_trip }}                                 
							</td> 

							<td>                                     
								{{ number_format($item->kuota, 5) }}                                 
							</td> 
							

							<td>
								<form action="{{ route('usulankuotaperperiode.destroy', $item->id_usulan_kuota) }}" method="POST">
									
									<a class="btn btn-success" href="{{ route('usulankuotaperperiode.show',$item->id_usulan_kuota) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('usulankuotaperperiode.edit',$item->id_usulan_kuota) }}"> <i class="fas fa-edit"></i></a>

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
					<!-- {{ $usulankuotaperperiode->links() }} -->
					{!! $usulankuotaperperiode->appends(Request::except('page'))->render() !!}   
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
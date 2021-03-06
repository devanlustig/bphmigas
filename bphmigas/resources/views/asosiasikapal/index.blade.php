@extends('adminlte::page') 
@section('title', 'Asosiasi Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Manage Asosiasi Kapal</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('asosiasikapal.create') }}">                
					<i class="fa fa-plus"></i> Tambah                     
				</a>
				<a style="float:right;" class="btn btn-danger" href="asosiasikapal/trash"><i class="fa fa-trash"></i> Tong Sampah</a>                 
			</div>

			<!-- @if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif   -->

			<div class="card-body">                     
				<table class="table table-bordered table-responsive">                         
					<thead>                             
						<tr>                                 
							<th style="width: 20px">#</th>                                 
							<th>@sortablelink('asosiasi_kapal', 'Asosiasi Kapal')</th>                                
							<th>Keterangan</th>                                 
							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($asosiasikapal->count())                            
						@foreach ($asosiasikapal as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->asosiasi_kapal }}                                 
							</td>                                 
							<td>                                     
								{{ $item->keterangan }}                                 
							</td>                                 
							<td>
								<!-- <form action="{{ route('asosiasikapal.destroy', $item->id) }}" method="POST"> -->
									
									<a class="btn btn-success" href="{{ route('asosiasikapal.show',$item->id) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('asosiasikapal.edit',$item->id) }}"> <i class="fas fa-edit"></i></a>
										
									<a class="btn btn-danger" href="asosiasikapal/softasos/{{ $item->id }}"><i class="fas fa-trash"></i></a>
									<?php /*
									@csrf
									@method('DELETE')

									<button type="submit" title="delete" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menghapus ?')">
                            		<i class="fas fa-trash"></i></button> 

								</form> */ ?>
							</td>
						</tr>  
						<?php $no++;?>                           

						@endforeach
						@endif                        
					</tbody>                     
				</table>                 
			</div>

			<div class="card-footer clearfix text-right">                     
				<!-- {{ $asosiasikapal->links() }} -->
				{!! $asosiasikapal->appends(Request::except('page'))->render() !!}   
			</div>             
		</div>         
	</div>     
</div> 

@stop 
@section('plugins.Sweetalert2', true) 
@section('plugins.Pace', true) @section('js')     
@if (session('success'))         
<script type="text/javascript">              
	Swal.fire(                   
		'Sukses!',                   
		'{{ session('success') }}',                   
		'success'             
		)         
	</script>     
	@endif 

	<!-- <script type="text/javascript">         
		function hapus(id){             
			Swal.fire({               
				title: 'Konfirmasi',               
				text: "Yakin menghapus data ini?",               
				icon: 'warning',               
				showCancelButton: true,               
				confirmButtonColor: '#3085d6',               
				cancelButtonColor: '#dd3333',               
				confirmButtonText: 'Hapus',               
				cancelButtonText: 'Batal',             
			}).then((result) => {               
				if (result.value) {                 
					$.ajax({                     
						url: "/asosiasikapal/"+id,                                 
						type: 'DELETE',                     
						data: {                         
							'_token': $('meta[name=csrf-token]').attr("content"),                     
						},                     
						success: function(result) {                         
							Swal.fire(                               
								'Sukses!',                               
								'Berhasil Hapus',                               
								'success'                         
								);                         
							location.reload();                     
						}                 
					});               
				}             
			})         
		}     
	</script>  -->
	@stop
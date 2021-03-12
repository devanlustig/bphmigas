@extends('adminlte::page') 
@section('title', 'Lintasan Operasi Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Lintasan Operasi Kapal</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('lintasan.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a>  

				<div style="float:right;">
				<form class="form-inline" action="{{ url('carilintasan') }}" method="GET" role="carilintasan">
					{{ csrf_field() }}
					<!-- <button class="btn btn-danger onClick="window.location.reload();"> <span class="fas fa-brain"></span></button> -->
					<input class="form-control" style="margin-right: 5px;" type="text" name="q" placeholder="Cari Data Operator ...">
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

			<div class="card-body">                     
				<table class="table table-bordered table-responsive">                         
					<thead>                             
						<tr>                                 
							<th style="width: 20px">#</th>                                 
							<th>@sortablelink('lintasan_operasi', 'Lintasan Operasi')</th>                                
							<th>Keterangan</th>                                 
							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($lintasan->count())                            
						@foreach ($lintasan as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->lintasan_operasi }}                                 
							</td>                                 
							<td>                                     
								{{ $item->keterangan }}                                 
							</td>                                 
							<td>
								<form action="{{ route('lintasan.destroy', $item->id_lintasan_operasi) }}" method="POST">
									
									<a class="btn btn-success" href="{{ route('lintasan.show',$item->id_lintasan_operasi) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('lintasan.edit',$item->id_lintasan_operasi) }}"> <i class="fas fa-edit"></i></a>

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
				
				{!! $lintasan->appends(Request::except('page'))->render() !!}   
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
@extends('adminlte::page') 
@section('title', 'Operator Kapal') 
@section('content_header')     
<h1 class="m-0 text-dark">Manage Operator Kapal</h1> 
@stop 
@section('content')     
<div class="row">         
	<div class="col-12">             
		<div class="card">   

			<div class="card-header">                     
				<a class="btn btn-primary btn-md" href="{{ route('operator.create') }}">                         
					<i class="fa fa-plus"></i> Tambah                     
				</a>  

				<div style="float:right;">
				<form class="form-inline" action="{{ url('carioperator') }}" method="GET" role="carioperator">
					{{ csrf_field() }}
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
							<th>@sortablelink('nama_operator', 'Nama Operator')</th>                                
							<th>Keterangan</th>                                 
							<th style="width: 16%">Aksi</th>                             
						</tr>                         
					</thead>                         
					<tbody>                             
						<?php $no=1;?> 
						@if($operator->count())                            
						@foreach ($operator as $item)                            
						<tr>                                 
							<td>                                     
								{{ $no }}                                 
							</td>                                 
							<td>                                     
								{{ $item->nama_operator }}                                 
							</td>                                 
							<td>                                     
								{{ $item->keterangan }}                                 
							</td>                                 
							<td>
								<form action="{{ route('operator.destroy', $item->id_operator) }}" method="POST">
									
									<a class="btn btn-success" href="{{ route('operator.show',$item->id_operator) }}"> <i class="fas fa-eye"></i></a>

									<a class="btn btn-primary" href="{{ route('operator.edit',$item->id_operator) }}"> <i class="fas fa-edit"></i></a>

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
				<!-- {{ $operator->links() }} -->
				{!! $operator->appends(Request::except('page'))->render() !!}   
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
@extends('adm')
@section('style')
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.css') }}">
<style>
	.breadcrumb{
		background-color: #fff !important;
	}
	.container-fluid{
		padding: 0 25px !important;
	}
	.content-body{
		background: white;
		padding: 20px 20px;
		margin-bottom: 25px;
	}
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Gestión de usuarios</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('usuario.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
</div>
<div class="content-body">
	<table id="usuarios" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
				<th></th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tbody>
        	@php
        		$id = 0;
        	@endphp
        	@foreach ($users as $item)
        		<tr>
        			@if ($item->photo)
        				<td width="6%"><img src='{{ Storage::url($item->photo) }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@else
        				<td width="6%"><img src='{{ asset("/images/profile/default.png") }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@endif
					<td>{{ $item->name }}</td>
					<td>{{ $item->lastname }}</td>
					<td>{{ $item->email }}</td>
					<td>
						<div class="d-flex justify-content-center">
							<a href="{{ route('usuario.edit', $item->id) }}" class="btn btn-outline-success mr-1"><i class="fa fa-edit"></i></a>
							<a href="#!" class="btn btn-outline-danger eliminarRegistro" data-id="{{ $item->id }}" data-row="{{ $id }}"><i class="fa fa-trash"></i></a>
						</div>
					</td>
				</tr>
				@php
					$id++;
				@endphp
        	@endforeach
        </tbody>
    </table>
</table>
</div>
@endsection

@section('script')
<script src="{{ asset('vendors/cdn_datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script>
	$(document).ready(function() {
	    var dataTable = $('#usuarios').DataTable();
	    $('#usuarios').on( 'click', 'tbody tr .eliminarRegistro', function () {
		  	var url = "{{ route('usuario.destroy',':ID') }}";
			var token = "{{ csrf_token() }}";
		  	var id = $(this)[0].dataset.id;
		  	var row = $(this)[0].dataset.row;
		  	url = url.replace(':ID',id);
		  	console.log(url);
		  	swal({
	            title: "¿Está seguro que desea eliminarlo?",
	            text: "!No se podrá recuperar el registro despues de confirmar la acción!",
	            type: "warning",
	            showCancelButton: true,
	            confirmButtonColor: "#DD6B55",
	            confirmButtonText: "!Si, Eliminarlo!",
	            cancelButtonText: "!No, Cancelar!",
	            closeOnConfirm: false,
	            closeOnCancel: false },
		        function (isConfirm) {
		            if (isConfirm) {
		            	eliminarRegistro(url,token);
		            	dataTable.row( row ).remove().draw();
		                swal("Eliminado!", "El registro ha sido eliminado correctamente", "success");
		            } else {
		                swal("Candelado", "El registro se encuentra a salvo :)", "error");
		            }
		        });
		} );
	} );
</script>
@endsection

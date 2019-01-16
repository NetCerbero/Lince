@extends('adm')
@section('style')
{{-- <link href="{{ asset('vendors/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js"> --}}
<style>
	body{
		/*font-size: 14px !important;*/
		/*background-color: #e4e5e6 !important;*/
	}
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
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> --}}
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}">
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Gestión de encuesta</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('encuesta.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
</div>
<div class="content-body">
	<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
				<th>Título</th>
				<th>Descripción</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tbody>
        	@php
        		$id = 0;
        	@endphp
        	@foreach ($encuestas as $item)
        		<tr>
        			<td>{{ $item->title }}</td>
					<td>{{ $item->description }}</td>
					<td>{{ $item->status }}</td>
					<td>
						<div class="d-flex justify-content-center">
							<a href="{{ route('showPoll',$item->id) }}" class="btn btn-outline-dark mr-1"><i class="fa fa-line-chart"></i></a>
							<a href="{{ route('encuesta.show',$item->id) }}" class="btn btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
							<a href="{{ route('encuesta.edit',$item->id) }}" class="btn btn-outline-success mr-1"><i class="fa fa-edit"></i></a>
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
</div>
@endsection

@section('script')
<script src="{{ asset('vendors/cdn_datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/push/push.js') }}"></script>
<script src="{{ asset('vendors/push/serviceWorker.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/push.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/serviceWorker.min.js"></script> --}}
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script>
	var tag = null;
	$(document).ready(function() {
	    let dataTable = $('#multimedia').DataTable();
		$('#multimedia').on( 'click', 'tbody tr .eliminarRegistro', function () {
		  	let url = "{{ route('encuesta.destroy',':ID') }}";
			let token = "{{ csrf_token() }}";
		  	let id = $(this)[0].dataset.id;
		  	let row = $(this)[0].dataset.row;
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

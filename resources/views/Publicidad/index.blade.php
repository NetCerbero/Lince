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
	.ad-view{
		width: 200px;
		height: 150px;
	}
	/*Small devices (landscape phones, 576px and up)*/
	@media (min-width: 576px) {
		.ad-view{
			width: 400px;
		}
	}

	/*medium devices (tablets, 768px and up)*/
	@media (min-width: 768px) { 
		.ad-view{
			width: 550px;
		}
	 }

	/*Large devices (desktops, 992px and up)*/
	@media (min-width: 992px) {
		.ad-view{
			width: 600px;
		}
	}

	/*Extra large devices (large desktops, 1200px and up)*/
	@media (min-width: 1200px){
		.ad-view{
			width: 600px;
		}
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
	<h5 class="text-muted font-weight-normal mb-0">Publicidad</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('publicidad.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
</div>
<div class="content-body">
	<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
				<th>Imagen</th>
				<th>Titulo</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tbody>
        	@php
        		$id = 0;
        	@endphp
        	@foreach ($ads as $item)
        		<tr>
        			<td>
        				<img class="ad-view" src="{{ Storage::url($item->path) }}" alt="">
        			</td>
        			<td>{{ $item->title }}</td>
					<td>
						@if ($item->status == 't')
							<a href="{{ route('statusChangeAds',$item->id) }}" data-toggle="tooltip" data-placement="top" title="Dele click para desactivarlo"><span class="badge badge-success">Activo</span></a>
						@else
							<a href="{{ route('statusChangeAds',$item->id) }}" data-toggle="tooltip" data-placement="top" title="Dele click para activarlo"><span class="badge badge-dark">Desactivado</span></a>
						@endif
					</td>
					<td>
						<div class="d-flex justify-content-center">
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
	$(document).ready(function() {
		$(function () {
			  $('[data-toggle="tooltip"]').tooltip();
		});
	    var dataTable = $('#multimedia').DataTable();
		$('#multimedia').on( 'click', 'tbody tr .eliminarRegistro', function () {
		  	var url = "{{ route('publicidad.destroy',':ID') }}";
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


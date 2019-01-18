@extends('adm')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}">
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
<h5 class="text-muted font-weight-normal mb-0">Gestión de contenidos multimedia (Series)</h5>
@endsection

@section('content')
@if(session('info'))
	<div class="d-flex justify-content-center">
		<div class="alert alert-success" role="alert">
		  {{ session('info')['msg'] }} <a href="{{ session('info')['action'] }}" class="alert-link">Click aqui si quiere cargar el nuevo archivo multimedia.</a>
		</div>
	</div>
@endif
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('serie.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
</div>
<div class="content-body">
	<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
				<th>Nombre</th>
				<th></th>
				<th>Tipo</th>
				<th>Estreno</th>
				<th>Vistos</th>
				<th>Acciones</th>
			</tr>
        </thead>
        <tbody>
        	@php
        		$id = 0;
        	@endphp
        	@foreach ($series as $item)
        		<tr>
        			<td>{{ $item->name }}</td>
        			@if ($item->cover)
        				<td width="6%"><img src='{{ Storage::url($item->cover) }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@else
        				<td width="6%"><img src='{{ Storage::url($pathDefault) }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@endif
        			@if ($item->type == 4)
        				<td>Serie (variado)</td>
        			@else
        				<td>Telenovela</td>
        			@endif
					<td>{{ $item->redate }}</td>
					<td>{{ $item->view }}</td>
					<td>
						<div class="d-flex justify-content-center">
							<a href="{{ route('uploadnotification',['id'=>$item->id,'type'=>'series']) }}" class="btn btn-outline-dark mr-1"><i class="fa fa-upload"></i></a>
							<a href="{{ route('serie.show',$item->id) }}" class="btn btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
							<a href="{{ route('serie.edit',$item->id) }}" class="btn btn-outline-success mr-1"><i class="fa fa-edit"></i></a>
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
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script>
	$(document).ready(function() {
	    var dataTable = $('#multimedia').DataTable();
	    @if(session('info'))
		    Push.create("Nuevo multimedia añadido", { //Titulo de la notificación
				body: "{{ session('info')['name'] }}", //Texto del cuerpo de la notificación
				icon: "{{ session('info')['img'] }}", //Icono de la notificación
				// timeout: 6000, //Tiempo de duración de la notificación
				onClick: function () {//Función que se cumple al realizar clic cobre la notificación
					window.location = "{{ session('info')['action'] }}"; //Redirige a la siguiente web
					this.close(); //Cierra la notificación
				},
				vibrate: [200, 100, 200, 100, 200, 100, 200],
			});
		@endif

		$('#multimedia').on( 'click', 'tbody tr .eliminarRegistro', function () {
		  	var url = "{{ route('contenido.destroy',':ID') }}";
			var token = "{{ csrf_token() }}";
		  	var id = $(this)[0].dataset.id;
		  	var row = $(this)[0].dataset.row;
		  	url = url.replace(':ID', id);
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
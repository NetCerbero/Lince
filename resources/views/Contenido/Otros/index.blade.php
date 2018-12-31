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

@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Gestión de contenidos multimedia</h5>
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
	<a href="{{ route('contenido.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
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
        	@foreach ($videos as $item)
        		<tr>
        			<td>{{ $item->name }}</td>
        			@if ($item->cover)
        				<td width="6%"><img src='{{ Storage::url($item->cover) }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@else
        				<td width="6%"><img src='{{ Storage::url($pathDefault) }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@endif
        			@if ($item->type == 1)
        				<td>Película</td>
        			@elseif($item->type == 2)
        				<td>Documental</td>
        			@else
        				<td>Video musical</td>
        			@endif
					<td>{{ $item->redate }}</td>
					<td>{{ $item->view }}</td>
					<td>
						<div class="d-flex justify-content-center">
							<a href="{{ route('uploadnotification',['id'=>$item->id,'type'=>'others']) }}" class="btn btn-outline-dark mr-1"><i class="fa fa-upload"></i></a>
							<a href="#" class="btn btn-outline-info mr-1"><i class="fa fa-eye"></i></a>
							<a href="#" class="btn btn-outline-success mr-1"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
						</div>
					</td>
				</tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/push.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/serviceWorker.min.js"></script>
<script>
	$(document).ready(function() {
	    $('#multimedia').DataTable();
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
	} );
</script>
@endsection

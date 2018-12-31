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
        	@foreach ($users as $item)
        		<tr>
        			@if ($item->photo)
        				<td width="6%"><img src='{{ asset("/images/profile/$item->photo") }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@else
        				<td width="6%"><img src='{{ asset("/images/profile/default.png") }}' class="img-fluid" style="height: 35px; width: 100%;"/></td>
        			@endif
					<td>{{ $item->name }}</td>
					<td>{{ $item->lastname }}</td>
					<td>{{ $item->email }}</td>
					<td>
						<div class="d-flex justify-content-center">
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
<script>
	$(document).ready(function() {
	    $('#usuarios').DataTable();
	} );
</script>
@endsection

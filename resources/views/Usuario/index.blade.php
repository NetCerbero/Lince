@extends('adm')
@section('style')
<link href="{{ asset('vendors/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Gestión de usuarios</h5>
@endsection

@section('content')
<table id="data-table-default" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="1%"></th>
			<th width="1%" data-orderable="false"></th>
			<th class="text-nowrap">Rendering engine</th>
			<th class="text-nowrap">Browser</th>
			<th class="text-nowrap">Platform(s)</th>
			<th class="text-nowrap">Engine version</th>
			<th class="text-nowrap">CSS grade</th>
		</tr>
	</thead>
	<tbody>
		<tr class="odd gradeX">
			<td width="1%" class="f-s-600 text-inverse">1</td>
			<td width="1%" class="with-img"><img src="{{ asset('/images/otros/user/user-1.jpg') }}" class="img-rounded height-30" /></td>
			<td>Trident</td>
			<td>Internet Explorer 4.0</td>
			<td>Win 95+</td>
			<td>4</td>
			<td>X</td>
		</tr>
		<tr class="even gradeC">
			<td class="f-s-600 text-inverse">2</td>
			<td class="with-img"><img src="{{ asset('/images/otros/user/user-2.jpg') }}" class="img-rounded height-30" /></td>
			<td>Trident</td>
			<td>Internet Explorer 5.0</td>
			<td>Win 95+</td>
			<td>5</td>
			<td>C</td>
		</tr>
		<tr class="odd gradeA">
			<td class="f-s-600 text-inverse">3</td>
			<td class="with-img"><img src="{{ asset('/images/otros/user/user-3.jpg') }}" class="img-rounded height-30" /></td>
			<td>Trident</td>
			<td>Internet Explorer 5.5</td>
			<td>Win 95+</td>
			<td>5.5</td>
			<td>A</td>
		</tr>
		<tr class="even gradeA">
			<td class="f-s-600 text-inverse">4</td>
			<td class="with-img"><img src="{{ asset('/images/otros/user/user-4.jpg') }}" class="img-rounded height-30" /></td>
			<td>Trident</td>
			<td>Internet Explorer 6</td>
			<td>Win 98+</td>
			<td>6</td>
			<td>A</td>
		</tr>
	</tbody>
</table>
@endsection

@section('script')
<script src="{{ asset('/vendors/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/vendors/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendors/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/js/table-manage-default.demo.min.js') }}"></script>
<script>
	$(document).ready(function() {
		TableManageDefault.init();
	});
</script>
@endsection

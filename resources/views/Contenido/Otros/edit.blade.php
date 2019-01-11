@extends('adm')

@section('style')
<link rel="stylesheet" href="{{ asset('js/FormValidation/FormValidation.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/FastSelect/fastselect.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}">
<style>
	.form-group{
		margin-bottom: 0.5rem;
	}
	.container-fluid {
	    padding: 0 24px;
	}
	.fstQueryInput {
	    border: none !important;
	    box-shadow: none !important;
	    font-weight: normal !important;
	}
	fieldset input{
		display: none !important;
	}
	.video-edit{
		height: 150px;
		width: 250px;
	}
</style>
@endsection

@section('title')
<h5 class="text-muted font-weight-normal mb-0">Edición de contenido multimedia</h5>
@endsection

@section('content')
@if ($content)
	<div class="content-body">
		<form action="{{ route('contenido.update',$content->id) }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
			@method('patch')
			@CSRF
			<div class="row">
				<div class="col-12 col-md-4">
	        		<label>Portada</label><span class="status" id="file-status"></span>
	            	<input type="file" id="file-cover" name="file" class="dropify" data-height="320"
						@if ($content->cover)
							data-default-file="{{ Storage::url($content->cover) }}"
						@else
							data-default-file="{{ Storage::url($content->defaultVariable()['cover']) }}"
						@endif
	            	data-allowed-file-extensions="jpg jpeg png"/>
				</div>
				<div class="col-12 col-md-8">
					{{-- <div class="form-row col-12 pr-sm-0 m-0"> --}}
						<div class="col-12 pr-sm-0">
							<label>Título</label><span class="status" id="name-status"></span>
							<input type="text" class="form-control" name="name" id="nombre-id" placeholder="Ingrese el nombre del contenido" data-validation="req len:0-255 regex:name" value="{{ $content->name }}" >
						</div>
						
					{{-- </div> --}}
					<div class="form-row col-12 pr-sm-0 m-0">
						<div class="col-12 col-sm-4 px-0">
							<label>País</label><span class="status" id="country_id-status"></span>
		                    <select name="country_id" data-validation="select-req">
		                        <option value="def">Seleccione el País</option>
		                        @foreach ($country as $item)
		                        	@if ($content->country_id === $item->id)
		                        		<option value="{{ $item->id }}" selected>{{ $item->country }}</option>
		                        	@else
										<option value="{{ $item->id }}">{{ $item->country }}</option>
		                        	@endif
		                        @endforeach
		                    </select>
						</div>
						<div class="col-12 col-sm-4 pr-1">
							<label>Estreno</label><span class="status" id="redate-status"></span>
							<input type="date" name="redate" placeholder="Año" data-validation="req" value="{{ $content->redate }}">
						</div>
						<div class="col-12 col-sm-4 px-0">
							<label>Tipo</label><span class="status" id="type-status"></span>
		                    <select name="type" data-validation="select-req">
		                        <option value="def">Seleccione el tipo de contenido</option>
		                        @if ($content->type === 1)
		                        	 <option value="1" selected>Película</option>
		                        	 <option value="2">Documental</option>
		                        	 <option value="3">Video musical</option>
		                       	@elseif($content->type === 2)
		                       		<option value="1">Película</option>
		                       		<option value="2" selected>Documental</option>
		                       		<option value="3">Video musical</option>
		                       	@else
		                       		<option value="1">Película</option>
		                       		<option value="2">Documental</option>
									<option value="3" selected>Video musical</option>
		                        @endif
		                    </select>
						</div>
					</div>
					<div class="form-group col-12 pr-sm-0">
						<label>Género</label><span class="status" {{-- id="genre-status" --}}></span>
	                    <select name="genre[]" {{-- data-validation="select-req" --}} class="multipleSelect" multiple>
	                    	@foreach ($genero as $item)
	                    		@if (is_numeric(array_search($item->id,array_column($genre_id, 'genre_id'))))
	                    			<option value="{{ $item->id }}" selected>{{ $item->name }}</option>
	                    		@else
	                    			<option value="{{ $item->id }}">{{ $item->name }}</option>
	                    		@endif
	                        @endforeach
	                    </select>
					</div>
					<div class="form-group col-12 pr-sm-0">
						<label>Descripción</label><span class="status" id="description-status"></span>
	                	<textarea name="description" placeholder="Ingrese la descripción o sinopsis" data-validation="len:0-400">{{ $content->description }}</textarea>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-end mr-3 mr-sm-0">
				<a href="{{ route('contenido.index') }}" class="btn btn-danger mr-2">Cancelar</a>
				<button class="submit btn btn-primary" type="submit" id="register-submit">Actualizar</button>
			</div>
		</form>
	</div>
	<div class="content-body mt-3">
		<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Media</th>
							<th>Idioma</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@php
							$id = 0;
						@endphp
						@foreach ($content->others as $item)
							<tr data-id={{ $item->id }}>
								<td>
									<div class="d-flex justify-content-center">
										<video class="video-edit" controls>
											<source src="{{ Storage::url($item->path) }}" type="video/{{ $item->extension }}">
					  						Tú navegador no soporta esta etiqueta.
										</video>
									</div>
								</td>
								<td>
									<select name="language">
										@foreach ($language as $lng)
											@if ($item->language_id == $lng->id)
												<option value="{{ $lng->id }}" selected>{{ $lng->language }}</option>
											@else
												<option value="{{ $lng->id }}">{{ $lng->language }}</option>
											@endif
										@endforeach
									</select>
								</td>
								<td>
									<div class="d-flex justify-content-center">
										<a href="#!" class="eliminarOther btn btn-danger" data-id="{{ $item->id }}" data-row={{ $id }}><i class="fa fa-trash"></i></a>
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
@endif
@endsection

@section('script')
<script src="{{ asset('js/FormValidation/FormValidation.js') }}"></script>
<script src="{{ asset('vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('vendors/FastSelect/fastsearch.js') }}"></script>
<script src="{{ asset('vendors/FastSelect/fastselect.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script>
	FormValidation(document.getElementById("register-form"));
	$(document).ready(function() {
	    $('#file-cover').dropify();
	    let dataTable = $('#multimedia').DataTable();
	    $('#multimedia').on( 'change', 'tbody tr select', function () {
	    	let url = "{{ route('other.update',':ID') }}";
	    	let token = "{{ csrf_token() }}";
		  	let row = $(this).parents('tr');
	    	let data = "_method=patch&language_id="+this.value;
	    	url = url.replace(':ID',row[0].dataset.id);
	    	actualizarRegistro(url,token,data);
	    });
	    
	    $('#multimedia').on('click','tbody tr .eliminarOther',function(){
	    	let url = "{{ route('other.destroy',':ID') }}";
			let token = "{{ csrf_token() }}";
		  	let id = $(this)[0].dataset.id;
		  	let row = $(this)[0].dataset.row;
		  	url = url.replace(':ID',id);
		  	console.log(url);
	    	console.log(this);
	    	console.log(this.value);
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
	    });
	});
	$('.multipleSelect').fastselect();
</script>
@endsection
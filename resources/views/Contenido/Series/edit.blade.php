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
<h5 class="text-muted font-weight-normal mb-0">Edición de contenido multimedia (Series)</h5>
@endsection

@section('content')
@if ($content)
	<div class="content-body">
		<form action="{{ route('serie.update',$content->id) }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
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
		                        @if ($content->type === 4)
		                        	 <option value="4" selected>Series (variado)</option>
		                        	 <option value="5">Telenovela</option>
		                       	@else
		                       		<option value="4">Series (variado)</option>
		                        	 <option value="5" selected>Telenovela</option>
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
	                	<textarea name="description" placeholder="Ingrese la descripción o sinopsis" data-validation="len:0-4000">{{ $content->description }}</textarea>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-end mr-3 mr-sm-0">
				<a href="{{ route('serie.index') }}" class="btn btn-danger mr-2">Cancelar</a>
				<button class="submit btn btn-primary" type="submit" id="register-submit">Actualizar</button>
			</div>
		</form>
	</div>
	<div class="content-body mt-3">
		<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Media</th>
							<th>Temporada</th>
							<th>Capítulo</th>
							<th>Idioma</th>
							<th>Título</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@php
							$id = 0;
						@endphp
						@foreach ($content->episodes as $item)
							<tr>
								<td class="d-flex justify-content-center">
									<video class="video-edit" controls preload="none">
										<source src="{{ Storage::url($item->other->path) }}" type="video/{{ $item->other->extension }}">
				  						Tú navegador no soporta esta etiqueta.
									</video>
								</td>
								<td>
									Temporada {{ $item->season }}
								</td>
								<td>
									Capítulo {{ $item->episode }}
								</td>
								<td>
									{{ $item->other->language['language'] }}
								</td>
								<td>
									{{ $item->name_episode }}
								</td>
								<td>
									<div class="d-flex justify-content-center">
										<a href="#!" class="eliminarOther btn btn-danger mr-1" data-id="{{ $item->id }}" data-row={{ $id }}><i class="fa fa-trash"></i></a>
										<a href="#!" class="editarEpisode btn btn-primary" data-id="{{ $item->id }}" data-row={{ $id }} data-toggle="modal" data-target="#editEpisode"><i class="fa fa-edit"></i></a>
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

	<div class="modal fade" id="editEpisode" tabindex="-1" role="dialog" aria-labelledby="episodeModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			    <h5 class="modal-title" id="episodeModalLabel">Modal title</h5>
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			      <span aria-hidden="true">&times;</span>
			    </button>
			  </div>
			  <div class="modal-body">
				<form action="{{ route('serieDataUpdate',':ID') }}" class="form-row" id="formEpisode">
					<input type="hidden" name="episode_id">
					<input type="hidden" name="nrow">
					<div class="form-group col-6">
						<label for="">Temporada</label>
						<select name="season" id="" required>
							<option value="" selected>Elija la temporada</option>
							@foreach ($rango as $nm)
								<option value="{{ $nm }}"> Temporada {{ $nm }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-6">
						<label for="">Capítulo</label>
						<select name="episode" id="" required>
							<option value="" selected>Elija el capítulo</option>
							@foreach ($rango as $nm)
								<option value="{{ $nm }}"> Capítulo {{ $nm }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-6">
						<label for="">Idioma</label>
						<select name="language_id" id="" required>
							<option value="" selected>Elija el idioma</option>
							@foreach ($language as $lng)
								<option value="{{ $lng->id }}">{{ $lng->language }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-6">
						<label for="">Fecha de estreno</label>
						<input type="date" name="redate">
					</div>
					<div class="form-group col-12">
						<label for="">Título</label>
						<input type="text" name="name_episode" placeholder="Ingrese el título del capítulo">
					</div>
					<div class="form-group col-12">
						<label for="">Título</label>
						<textarea name="description_episode" cols="30" rows="10" placeholder="Ingrese la descripción del capítulo"></textarea>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			    <button type="button" class="btn btn-primary" onclick="updateData()">Guardar</button>
			  </div>
			</div>
		</div>
	</div>
@else
	<div class="alert alert-info d-flex justify-content-center" role="alert">
		No existe el archivo multimedia
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
	var editor;
	var grow;
	FormValidation(document.getElementById("register-form"));
	$(document).ready(function() {
	    $('#file-cover').dropify();
	    let dataTable = $('#multimedia').DataTable();
	    editor = dataTable;
	    $('#multimedia').on('click','tbody tr .eliminarOther',function(){
	    	let url = "{{ route('serie.destroy',':ID') }}";
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

	    $('#multimedia').on('click','tbody tr .editarEpisode',function(){
	    	let tag = $(this)[0];
	    	grow = $(this);
	    	let id = tag.dataset.id;
	    	let nRow = tag.dataset.row;
	    	EditarForm(id, nRow);
	    });
	});
	$('.multipleSelect').fastselect();
	var fn = null;
	function EditarForm(id, nRow){
		let url = "{{ route('serieData',':ID') }}";
		url = url.replace(':ID',id);
		$.get(url,function(rsp,status){
			if(status == "success"){
				let inputs = document.getElementById('formEpisode').querySelectorAll('[name]');
				for(let i = 0; i < inputs.length; i++){
					switch(inputs[i].name){
						case 'episode_id':
							inputs[i].value = id;
							break;
						case 'nrow':
							inputs[i].value = nRow;
							break;
						case 'season':
							inputs[i].value = rsp.season;
							break;
						case 'episode':
							inputs[i].value = rsp.episode;
							break;
						case 'language_id':
							inputs[i].value = rsp.language_id;
							break;
						case 'redate':
							inputs[i].value = rsp.redate;
							break;
						case 'name_episode':
							inputs[i].value = rsp.name_episode;
							break;
						case 'description_episode':
							inputs[i].value = rsp.description_episode;
							break;
					}
				}
			}
		}).fail(e => console.log(e));
	}

	function updateRowTable(row, data){
		console.log(row);
		let d = editor.row(row).data();
		for(let i = 0; i < data.length; i++){
			switch(data[i].name){
				case 'season':
					d[1] = data[i].options[data[i].value].text;
					break;
				case 'episode':
					d[2] = data[i].options[data[i].value].text;
					break;
				case 'language_id':
					d[3] = data[i].options[data[i].value].text;
					break;
				case 'name_episode':
					d[4] = data[i].value;
					break;
			}
		}
		editor.row(row).data(d).invalidate().draw();
	}
	function updateData(){
		let form = $('#formEpisode');
		fn = form;
		if(form[0].checkValidity()){
			let dataRequest = form.serialize();
			let data = form[0].querySelectorAll('[name]');
			let url = form.attr('action');
			let token = "{{ csrf_token() }}";
			url = url.replace(':ID',form[0].querySelector('[name=episode_id]').value);
			actualizarRegistro(url,token,dataRequest);
			updateRowTable(form[0].querySelector('[name=nrow]').value,data);
			$('#editEpisode').modal('toggle');
		}else{
			form[0].reportValidity();
		}
	}
</script>
@endsection

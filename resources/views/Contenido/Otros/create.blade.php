@extends('adm')

@section('style')
<style>

	h2 {
		text-align: center;
	}

	input,
	select,
	textarea {
		color: #086736;
	}

	button {
		outline: none;
	}
	button.submit {
		border-radius: 5px;
		/*border: 2px solid #086736;*/
		/*background: #086736;*/
		color: #fff;
		cursor: pointer;
		padding: 7px 15px;
		font-weight: bold;
		font-family: Arial, sans-serif;
	    /*font-size: 15px;*/
	}
	button.submit:hover {
		/*background: #59993E;*/
		/*border-color: #59993E;*/
	}
	button.submit:disabled {
		/*background: 0;*/
		/*border: 2px solid #086736;*/
		/*color: #086736;*/
		cursor: not-allowed;
	}
	label {
		font-size: 16px;
		margin: 5px 0 5px 0;
		padding-left: 5px;
		display: inline-block;
	}

	.checkboxes,
	.radio-buttons {
		display: inline;
		margin-bottom: 20px;
		padding: 0;
		text-align: center;
	}

	input,
	textarea {
		outline: none;
	}

	select,
	input:not([type="radio"]):not([type="checkbox"]):not([type="file"]) {
		display: block;
		width: 100%;
		padding: 5px;
		font-family: Arial, sans-serif;
		font-weight: bold;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 2px 6px rgba(0,0,0,0.2);
		box-shadow: inset 0 2px 6px rgba(0,0,0,0.2);
	}
	select.error,
	input:not([type="radio"]):not([type="checkbox"]).error,
	textarea.error {
		border-color: #a94442;
		box-shadow: inset 0 2px 6px rgba(169,68,66,0.2);
	}
	textarea {
		/*margin-bottom: 20px;*/
		display: block;
		width: 100%;
		padding: 5px;
		height: 100px;
		resize: none;
		font-family: Arial, sans-serif;
		font-weight: bold;
		/*font-size: 16px;*/
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	}
	.status {
		padding: 5px;
		margin: 5px 0;
		border: 1px solid transparent;
		border-radius: 4px;
		text-align: center;
		display: inherit;
	}
	form .status {
		display: inline-block;
		margin: 0 0 0 20px;
		padding: 2px 6px;
	}
	.status h3,
	.status p {
		margin: 0;
	}
	.status-success {
		color: #3c763d;
		background-color: #dff0d8;
		border-color: #d6e9c6;
	}
	.status-error {
		color: #a94442;
		background-color: #f2dede;
		border-color: #ebccd1;
	}
	.form-group{
		margin-bottom: 0.5rem;
	}
	.container-fluid {
	    padding: 0 24px;
	}
	.content-body{
	    background: #fff;
	    padding: 20px;
	}
	.fstQueryInput {
	    border: none !important;
	    box-shadow: none !important;
	    font-weight: normal !important;
	}
</style>
<link rel="stylesheet" href="{{ asset('vendors/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/FastSelect/fastselect.css') }}">
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Registro de contenido multimedia</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('contenido.store') }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		<div class="row">
			<div class="col-12 col-md-4">
        		<label>Portada</label><span class="status" id="file-status"></span>
            	<input type="file" id="file-cover" name="file" class="dropify" data-height="320"/>
			</div>
			<div class="col-12 col-md-8">
				{{-- <div class="form-row col-12 pr-sm-0 m-0"> --}}
					<div class="col-12 pr-sm-0">
						<label>Título</label><span class="status" id="name-status"></span>
						<input type="text" class="form-control" name="name" id="nombre-id" placeholder="Ingrese el nombre del contenido" data-validation="req len:0-255 regex:name">
					</div>
					
				{{-- </div> --}}
				<div class="form-row col-12 pr-sm-0 m-0">
					<div class="col-12 col-sm-4 px-0">
						<label>País</label><span class="status" id="country_id-status"></span>
	                    <select name="country_id" data-validation="select-req">
	                        <option value="def">Seleccione el País</option>
	                        @foreach ($country as $item)
	                        	<option value="{{ $item->id }}">{{ $item->country }}</option>
	                        @endforeach
	                    </select>
					</div>
					<div class="col-12 col-sm-4 pr-1">
						<label>Estreno</label><span class="status" id="redate-status"></span>
						<input type="date" name="redate" placeholder="Año" data-validation="req">
					</div>
					<div class="col-12 col-sm-4 px-0">
						<label>Tipo</label><span class="status" id="type-status"></span>
	                    <select name="type" data-validation="select-req">
	                        <option value="def">Seleccione el tipo de contenido</option>
	                        <option value="1">Película</option>
	                        <option value="2">Documental</option>
	                        <option value="3">Video musical</option>
	                    </select>
					</div>
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Género</label><span class="status" {{-- id="genre-status" --}}></span>
                    <select name="genre[]" {{-- data-validation="select-req" --}} class="multipleSelect" multiple>
                        {{-- <option selected value="def">Select a State...</option> --}}
                        @foreach ($genero as $item)
                        	<option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Descripción</label><span class="status" id="description-status"></span>
                	<textarea name="description" placeholder="Ingrese la descripción o sinopsis" data-validation="len:0-400"></textarea>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-end mr-3 mr-sm-0">
			<a href="{{ route('contenido.index') }}" class="btn btn-danger mr-2">Cancelar</a>
			<button class="submit btn btn-primary" type="submit" id="register-submit">Registrar</button>
		</div>
	</form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/FormValidation/FormValidation.js') }}"></script>
<script src="{{ asset('vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('vendors/FastSelect/fastsearch.js') }}"></script>
<script src="{{ asset('vendors/FastSelect/fastselect.js') }}"></script>
<script src="{{ asset('vendors/dropzone/min/dropzone.min.js') }}"></script>
<script>
	FormValidation(document.getElementById("register-form"));
	$(document).ready(function() {
	    $('#file-cover').dropify();
	        $('.listPatients').change(function(){
	        	var id = $(this).val();
	        	var item = $(this).parent().next();
	        	if( id != -1){
	        		item.removeClass('d-none');
	        		item.addClass('d-display');
	        	}else{
	        		item.removeClass('d-display');
	        		item.addClass('d-none');
	        	}
	    });
	});
	$('.multipleSelect').fastselect();
</script>

@endsection
@extends('adm')

@section('style')
<link rel="stylesheet" href="{{ asset('js/FormValidation/FormValidation.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/FastSelect/fastselect.css') }}">
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
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Registro de contenido multimedia (Series)</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('serie.store') }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		<div class="row">
			<div class="col-12 col-md-4">
        		<label>Portada</label><span class="status" id="file-status"></span>
            	<input type="file" id="file-cover" name="file" class="dropify" data-height="320" data-allowed-file-extensions="jpg jpeg png svg/>
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
	                        <option value="4">Series (variado)</option>
	                        <option value="5">Telenovela</option>
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
			<a href="{{ route('serie.index') }}" class="btn btn-danger mr-2">Cancelar</a>
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
<script>
	FormValidation(document.getElementById("register-form"));
	$(document).ready(function() {
	    $('#file-cover').dropify();
	});
	$('.multipleSelect').fastselect();
</script>
@endsection
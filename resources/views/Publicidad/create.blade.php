@extends('adm')

@section('style')
<link rel="stylesheet" href="{{ asset('js/FormValidation/FormValidation.css') }}">
<style>
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
</style>
<link rel="stylesheet" href="{{ asset('vendors/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Crear publicidad</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('publicidad.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Atras</a>
</div>
<div class="alert alert-info" role="alert">
  <strong>Nota:</strong> cargar la imagen de la publicidad, caso contrario no se registrará en el sistema
</div>
<div class="content-body">
	<form action="{{ route('publicidad.store') }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		<div class="row">
			<div class="col-12">
				<label>Título</label><span class="status" id="title-status"></span>
				<input type="text" class="form-control" name="title" placeholder="ingrese el título" data-validation="req len:0-255 regex:name" required>
			</div>
			<div class="col-12">
        		<label>Foto de perfil</label>
            	<input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="250" data-allowed-file-extensions="jpg jpeg png svg" required/>
			</div>
		</div>
		<div class="d-flex justify-content-end mt-2 mr-3 mr-sm-0">
			<a href="{{ route('publicidad.index') }}" class="btn btn-danger mr-2">Cancelar</a>
			<button class="submit btn btn-primary" type="submit" id="register-submit">Registrar</button>
		</div>
	</form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/FormValidation/FormValidation.js') }}"></script>
<script src="{{ asset('vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script>
	FormValidation(document.getElementById("register-form"));
	$(document).ready(function() {
	    $('.dropify').dropify();
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
</script>

@endsection
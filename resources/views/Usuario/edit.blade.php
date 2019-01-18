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
	<h5 class="text-muted font-weight-normal mb-0">Edición de usuario</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('usuario.update',$user->id) }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		@method('patch')
		<div class="row">
			<div class="col-12 col-md-4">
        		<label>Foto de perfil</label>
            	<input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="250" data-allowed-file-extensions="jpg jpeg png svg" data-default-file="{{ Storage::url($user->photo) }}"/>
			</div>
			<div class="col-12 col-md-8">
				<div class="form-group col-12 pr-sm-0">
					<label>Nombre</label><span class="status" id="name-status"></span>
					<input type="text" class="form-control" name="name" placeholder="ingrese el nombre del usuario" data-validation="req len:0-255 regex:name" value="{{ $user->name }}">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Apellido</label><span class="status" id="lastname-status"></span>
					<input type="text" class="form-control" name="lastname" placeholder="ingrese el apellido del usuario" data-validation="req len:0-255 regex:name" value="{{ $user->lastname }}">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Email</label><span class="status" id="email-status"></span>
					<input type="email" name="email" placeholder="Email" data-validation="req len:0-50 regex:email" value="{{ $user->email }}">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Contraseña</label><span class="status"></span>
					<input type="password" class="form-control" name="password" placeholder="ingrese la Contraseña">
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-end mr-3 mr-sm-0">
			<a href="{{ route('usuario.index') }}" class="btn btn-danger mr-2">Cancelar</a>
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
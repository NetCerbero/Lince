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
	<h5 class="text-muted font-weight-normal mb-0">Registro de usuario</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('usuario.store') }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		<div class="row">
			<div class="col-12 col-md-4">
        		<label>Foto de perfil</label>
            	<input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="250" data-allowed-file-extensions="jpg jpeg png svg"/>
			</div>
			<div class="col-12 col-md-8">
				<div class="form-group col-12 pr-sm-0">
					<label>Nombre</label><span class="status" id="name-status"></span>
					<input type="text" class="form-control" name="name" placeholder="ingrese el nombre del usuario" data-validation="req len:0-255 regex:name">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Apellido</label><span class="status" id="lastname-status"></span>
					<input type="text" class="form-control" name="lastname" placeholder="ingrese el apellido del usuario" data-validation="req len:0-255 regex:name">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Email</label><span class="status" id="email-status"></span>
					<input type="email" name="email" placeholder="Email" data-validation="req len:0-50 regex:email">
				</div>
				<div class="form-group col-12 pr-sm-0">
					<label>Contraseña</label><span class="status" id="password-status"></span>
					<input type="password" class="form-control" name="password" placeholder="ingrese la Contraseña" data-validation="req len:5-45">
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-end mr-3 mr-sm-0">
			<a href="{{ route('usuario.index') }}" class="btn btn-danger mr-2">Cancelar</a>
			<button class="submit btn btn-primary" type="submit" id="register-submit">Registrar</button>
		</div>
	</form>
</div>

           {{--  <form id="register-form" novalidate>
                <div class="col-lg-8 col-sm-10 center-block">
                    <label>Full Name</label><span class="status" id="name-status"></span>
                    <input type="text" name="name" placeholder="Full Name" data-validation="req len:0-45 regex:name">

                    <label>Username</label><span class="status" id="username-status"></span>
                    <input type="text" name="username" placeholder="Username" data-validation="req len:3-15 regex:username">

                    <div class="col-xs-12 no-padding">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Gender</label><span class="status" id="gender-status"></span>
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Female</label>
                                <input type="radio" name="gender" value="female" data-validation="radio:gender">
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Male</label>
                                <input type="radio" name="gender" value="male" data-validation="radio:gender">
                            </div>
                            <div class="col-xs-4 radio-buttons">
                                <label>Other</label>
                                <input type="radio" name="gender" value="other" data-validation="radio:gender">
                            </div>
                        </div>
                    </div>

                    <label>Email</label><span class="status" id="email-status"></span>
                    <input type="email" name="email" placeholder="Email" data-validation="len:0-50 regex:email or:phone:Phone">

                    <label>Phone</label><span class="status" id="phone-status"></span>
                    <input type="tel" name="phone" placeholder="Phone" data-validation="len:0-15 regex:phone or:email:Email"/>

                    <label>Add a Message</label><span class="status" id="message-status"></span>
                    <textarea name="message" placeholder="Message" data-validation="len:0-500"></textarea>

                    <div class="col-xs-12 no-padding">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Contact Me Via</label><span class="status" id="contact-status"></span>
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Phone</label>
                                <input type="checkbox" name="contact" value="phone" data-validation="checkbox:contact:1-2">
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Email</label>
                                <input type="checkbox" name="contact" value="email" data-validation="checkbox:contact:1-2">
                            </div>
                            <div class="col-xs-4 checkboxes">
                                <label>Owl Post</label>
                                <input type="checkbox" name="contact" value="owl-post" data-validation="checkbox:contact:1-2">
                            </div>
                        </div>
                    </div>

                    <label>State</label><span class="status" id="state-status"></span>
                    <select name="state" data-validation="select-req">
                        <option value="def">Select a State...</option>
                        <option value="QLD">Queensland</option>
                        <option value="NSW">New South Wales</option>
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="VIC">Victoria</option>
                        <option value="TAS">Tasmania</option>
                        <option value="SA">South Australia</option>
                        <option value="NT">Northern Territory</option>
                        <option value="WA">Western Australia</option>
                    </select>

                    <label>Password</label><span class="status" id="password-status"></span>
                    <input type="password" name="password" placeholder="Password" data-validation="req len:8-25">

                    <label>Confirm Password</label><span class="status" id="confirmpassword-status"></span>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" data-validation="req len:8-25 match:password">

                    <div class="center">
                        <button class="submit" type="submit" id="register-submit">Submit</button>
                    </div>
                </div>
            </form> --}}
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
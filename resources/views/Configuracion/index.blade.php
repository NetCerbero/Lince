@extends('adm')
@section('style')
<style>
	.container-fluid{
		padding: 0 25px !important;
	}
	.content-body{
		background: white;
		padding: 20px 20px;
		margin-bottom: 25px;
	}
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Configuración</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('setting.update',$setting->id) }}" method="post" class="form">
		@CSRF
		@method('patch')
		<div class="row">
			<div class="col-12">
				<label>Dirección</label>
				<input type="text" class="form-control" name="address" value="{{ $setting->address }}" required>
			</div>
			<div class="col-12 col-md-4">
				<label>Correo empresarial</label>
				<input type="email" class="form-control" name="email" value="{{ $setting->email }}" required>
			</div>
			<div class="col-12 col-md-4">
				<label>Teléfono Lince</label>
				<input type="number" class="form-control" name="phone" value="{{ $setting->phone }}" required>
			</div>
			<div class="col-12 col-md-4">
				<label>Whatsapp</label>
				<input type="number" class="form-control" name="whatsapp" value="{{ $setting->whatsapp }}" required>
			</div>
			<div class="col-12">
				<label>Facebook</label>
				<input type="link" class="form-control" name="facebook" value="{{ $setting->facebook }}" required>
			</div>
			<div class="col-12">
				<label>Instagram</label>
				<input type="link" class="form-control" name="instagram" value="{{ $setting->instagram }}" required>
			</div>
			<div class="col-12">
				<label>Sobre la Lince</label>
				<textarea name="about" rows="5" class="form-control" required>{{ $setting->about }}</textarea>
			</div>
		</div>
		<div class="d-flex justify-content-end mt-2">
			<button class="btn btn-primary" type="submit">Guardar</button>
		</div>
	</form>
</div>
@endsection

@section('script')

@endsection

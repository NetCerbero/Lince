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
	<h5 class="text-muted font-weight-normal mb-0">Gestión de encuesta</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('encuesta.create') }}" class="btn btn-primary">Nuevo <i class="fa fa-address-book"></i></a>
</div>
<div class="content-body">
	
</div>
@endsection

@section('script')

@endsection

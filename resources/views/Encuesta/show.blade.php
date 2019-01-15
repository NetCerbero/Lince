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
	.card{
		margin-bottom: 0 !important;
	}
	.question-show-title:hover{
		text-decoration: none;
	}
	/*.question-response{
		width: 100%;
		text-align: justify;
	}*/
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Gestión de encuesta - visualización</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('encuesta.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"> Atras</i></a>
</div>
<div class="content-body">
	<div>
		<p class="mb-1 text-justify"><strong>Título:</strong> {{ $encuesta->title }}</p>
		<p class="mb-1 text-justify"><strong>Mensaje:</strong> {{ $encuesta->message }}</p>
		<p class="mb-1 text-justify"><strong>Descripción:</strong> {{ $encuesta->description }}</p>
		@if ($encuesta->status == 't')
			<p class="mb-1"><strong>Estado:</strong> <span class='badge badge-success'>Activo</span></p>
		@else
			<p class="mb-1"><strong>Estado:</strong> <span class='badge badge-info'>Inactivo</span></p>
		@endif
		<p><strong>Preguntas: </strong> {{ count($questions) }}</p>
	</div>

	<div id="accordion">
		@forelse ($questions as $item)
		    <div class="card">
				<div class="card-header" id="headingOne">
					<a href="#!" class="question-show-title" data-toggle="collapse" data-target="#question-{{ $item->id }}" aria-expanded="true" aria-controls="question-{{ $item->id }}">
						<p class="mb-0"> {{ $item->question }} <span class='badge badge-dark'> {{ $item->type->name }}</span></p>
					</a>
				</div>

				<div id="question-{{ $item->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						@forelse ($item->responses as $rsp)
							{{-- <div class="question-response mb-1">
							  {{ $rsp->response }}
							</div> --}}	
							<div class="alert alert-secondary mb-1" role="alert">
							  {{ $rsp->response }}
							</div>
						@empty
						    <div class="alert alert-info mb-0" role="alert">
							  No existen respuestas para este tipo de preguntas (son de retroalimentación)
							</div>
						@endforelse
					</div>
				</div>
	  		</div>
		@empty
		    <div class="alert alert-info" role="alert">
			  No hay preguntas para esta encuesta
			</div>
		@endforelse
  	</div>
</div>
@endsection

@section('script')

@endsection

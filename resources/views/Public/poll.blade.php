@extends('layout')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/steps/jquery.steps.css') }}" text="text/css">
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.css') }}" text="text/css">
{{-- <link rel="stylesheet" href="http://www.jquery-steps.com/Content/Examples?v=oArYkice2OEJI0LuKioGJ4ayetiUonme8i983GzQqX41"> --}}
<style>
	.encuesta-pregunta{
		margin-bottom: 0;
		font-size: 17px;
	}
	.highlight{
		background-color: #fff;
	}
	.wizard > .content{
		height: auto !important;
		overflow: none;
	}
	.text-area{
		width: 100%;
		border-radius: 8px;
   		padding: 4px;
	}
	.custom-control-label{
		margin-bottom: 0 !important;
		font-size: 14px !important;
	}
	.section-question{
		height: auto !important;
		position: relative !important;
	}
</style>
@endsection

@section('content')
<div class="container">
	<div class="alert alert-info" role="alert">
	  <strong>Nota:</strong> {{ $encuesta->message }}
	</div>
	<form id="form-encuesta-lince" action="{{ route('savePoll',$encuesta->id) }}">
		@CSRF
		@for ($i = 0; $i < count($questions); $i++)
			@if ( $i % 4 == 0)
				<h3>Sección</h3>
				<section class="section-question">
			@endif
	    	@if ($questions[$i]->type['type'] == 'radio')
	    		<input type="hidden" name="rsp[q_{{ $i }}][type]" value="{{ $questions[$i]->type['type'] }}">
		    	<input type="hidden" name="rsp[q_{{ $i }}][id]" value="{{ $questions[$i]->id }}">
				<div class="mb-2">
		    		<p class="encuesta-pregunta"><span class="highlight"><strong>{{ $i + 1 }}.-</strong> {{ $questions[$i]->question }}</span></p>
		    		@php
		    			$j = 0;
		    		@endphp
		    		@foreach ($questions[$i]->responses as $rsp)
		    			<div class="custom-control custom-radio">
					  		<input type="radio" id="{{ $i }}customRadio{{ $j }}" name="q_{{ $i }}" value="{{ $rsp->id }}" class="custom-control-input">
						  	<label class="custom-control-label" for="{{ $i }}customRadio{{ $j }}">{{ $rsp->response }}</label>
						</div>
						@php
							$j++;
						@endphp
		    		@endforeach
		    	</div>
		    @else
		    	<div>
		    		<p class="encuesta-pregunta"><span class="highlight"><strong>{{ $i + 1 }}.-</strong> {{ $questions[$i]->question }}</span></p>
		    		<input type="hidden" name="rsp[q_{{ $i }}][type]" value="{{ $questions[$i]->type['type'] }}">
		    		<input type="hidden" name="rsp[q_{{ $i }}][id]" value="{{ $questions[$i]->id }}">
		    		<textarea name="q_{{ $i }}" class="text-area" placeholder="Ingrese la respuesta"></textarea>
		    	</div>
	    	@endif
			@if ( ($i + 1) % 4 == 0)
				</section>
			@endif
		@endfor
	</form>
</div>
@endsection
@section('script')
<script src="{{ asset('vendors/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendors/steps/jquery.steps.js') }}"></script>
<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
<script>
	function savePoll(form){
		swal({
	            title: "La encuesta será enviado a Lince",
	            text: "las repuestas serán tomadas en cuenta para mejorar nuestros servicios",
	            type: "info",
	            showCancelButton: true,
	            confirmButtonColor: "#1AB394",
	            confirmButtonText: "!Si, Enviar!",
	            cancelButtonText: "!No, Cancelar!",
	            closeOnConfirm: false,
	            closeOnCancel: false },
		        function (isConfirm) {
		            if (isConfirm) {
		            	console.log("guardando");
						var url = form.attr('action');
						$.post(url,form.serialize(),function(rsp,status){
							if(status == "success"){
								swal({
									title: "!Enviado!",
									text: "Las respuestas se enviaron correctamente",
									type: "success"},
									function(confirm){
										window.location.href = "{{ route('home') }}";
									});
							}
						}).fail(function(e){
							swal("!Ha ocurrido un error!", "Vuelva a intentarlo de nuevo", "warning");
						});
		            } else {
		                swal("Candelado", "No se enviaron las respuestas", "error");
		            }
		        });
	}
	$(document).ready(function(){
		var form = $("#form-encuesta-lince").show();
		form.steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
		        // Allways allow previous action even if the current form is not valid!
		        if (currentIndex > newIndex)
		        {
		            return true;
		        }
		        // Forbid next action on "Warning" step if the user is to young
		        if (newIndex === 3 && Number($("#age-2").val()) < 18)
		        {
		            return false;
		        }
		        // Needed in some cases if the user went back (clean up)
		        if (currentIndex < newIndex)
		        {
		            // To remove error styles
		            form.find(".body:eq(" + newIndex + ") label.error").remove();
		            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		        }
		        form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onStepChanged: function (event, currentIndex, priorIndex)
		    {
		        // Used to skip the "Warning" step if the user is old enough.
		        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
		        {
		            form.steps("next");
		        }
		        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
		        if (currentIndex === 2 && priorIndex === 3)
		        {
		            form.steps("previous");
		        }
		    },
		    onFinishing: function (event, currentIndex)
		    {
		        form.validate().settings.ignore = ":disabled";
		        return form.valid();
		    },
		    onFinished: function (event, currentIndex)
		    {
		        savePoll(form);
		    },
		    labels: {
		        cancel: "Cancelar",
		        current: "current step:",
		        pagination: "Paginación",
		        finish: "Finalizar",
		        next: "Siguiente",
		        previous: "Anterior",
		        loading: "Cargando ..."
		    }
		}).validate({
		    errorPlacement: function errorPlacement(error, element) {element.before(error);},
		    rules: {
		        @for ($j = 0; $j < $i ; $j++)
		        	q_{{ $j }}:{
			        	required: true
			        },
		        @endfor
		    }
		});
	});
</script>
@endsection
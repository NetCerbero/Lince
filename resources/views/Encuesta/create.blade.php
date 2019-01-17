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
	.fstQueryInput {
	    border: none !important;
	    box-shadow: none !important;
	    font-weight: normal !important;
	}
	.field-class{
		width: 95% !important;
		display: inline-block !important;
	}
	.table-response{
		display: block;
	}
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Registro de encuesta</h5>
@endsection

@section('content')
<div class="content-body">
	<form action="{{ route('encuesta.store') }}" method="POST" class="form" id="register-form" enctype="multipart/form-data" novalidate>
		@CSRF
		<div class="row">
				<div class="col-12 col-md-6">
					<label>Título</label><span class="status" id="title-status"></span>
					<input type="text" class="form-control" name="title" id="nombre-id" placeholder="Ingrese el título de la encuesta" data-validation="req len:0-255 regex:name">
				</div>
				<div class="col-12 col-md-6">
					<label>Mensaje</label><span class="status" id="message-status"></span>
					<input type="text" class="form-control" name="message" id="nombre-id" placeholder="Ingrese el mensaje de la encuesta" data-validation="req len:0-255 regex:name">
				</div>
				<div class="form-group col-12">
					<label>Descripción</label><span class="status" id="description-status"></span>
                	<textarea name="description" placeholder="Ingrese la descripción de la encuesta" data-validation="len:0-250"></textarea>
				</div>
		</div>
		<div class="alert alert-info" role="alert">
		  Debe ingresar las preguntas (click en el botón [<i class="fa fa-plus"></i>])
		</div>
		<div class="d-flex justify-content-start mb-2">
			<div>
				<strong>Preguntas</strong> <a href="#!" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></a>
			</div>
		</div>
		<div class="table-responsive-md">
			<table class="table">
				<thead>
					<tr>
						<th>Pregunta</th>
						<th>Respuestas</th>
						<th>Tipo</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="table-encuesta-data">
				</tbody>
			</table>
		</div>
		<div class="d-flex justify-content-end mr-3 mr-sm-0">
			<a href="{{ route('encuesta.index') }}" class="btn btn-danger mr-2">Cancelar</a>
			<button class="submit btn btn-primary" type="submit" id="register-submit">Registrar</button>
		</div>
	</form>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="#!" id="formularioModal">
			<div class="row">
				<div class="col-12">
					<label>Pregunta</label>
					<input type="text" name="pregunta" placeholder="Ingrese la pregunta" required>
				</div>
				<div class="col-12">
					<label>Tipo</label>
					<select name="tipo" required id="tipoPregunta">
						<option value="">Elija el tipo</option>
						@foreach ($types as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-12" id="respuestasFormulario" hidden="true">
					<label>Respuesta <a href="#!" class="btn btn-info" id="addFieldModal"><i class="fa fa-plus"></i></a></label>
				</div>
				<div class="col-12" id="respuestasFormularioMultiples" hidden="true">
					{{-- <div><input type="text" class="mb-1 mr-1 field-class"><i class="fa fa-trash" onclick="eliminarPreguntaModal(this)"></i></div> --}}
				</div>
			</div>
		</form>      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('formularioModal').reset()">Limpiar</button>
        <button type="button" class="btn btn-primary" onclick="agregarTabla()">Agregar</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/FormValidation/FormValidation.js') }}"></script>
<script>
	FormValidation(document.getElementById("register-form"));
	var tag = null;
	$(document).ready(function() {
	    $('#tipoPregunta').change(function(){
	    	if(this.value == 1){
	    		$('#respuestasFormulario').removeAttr('hidden');
	    		$('#respuestasFormularioMultiples').removeAttr('hidden');
	    	}else{
	    		$('#respuestasFormulario').attr('hidden','hidden');
	    		$('#respuestasFormularioMultiples').attr('hidden','hidden');
	    		$('#respuestasFormularioMultiples').html("");
	    	}
	    });
	    $('#addFieldModal').click(function(){
	    	addField();
	    });
	});
	function addField(){
		var fields = $('#respuestasFormularioMultiples');
		var hmtl = '<div><input type="text" class="mb-1 mr-1 field-class" name="respuesta" placeholder="Escriba la pregunta" required><i class="fa fa-trash" onclick="eliminarPreguntaModal(this)"></i></div>';
		fields.append(hmtl);
	}
	function eliminarPreguntaModal(e){
		e.parentElement.remove();
	}
	var tagTable = {
		'nCell': 4,
		'row':'<tr>:ROW</tr>',
		'cell': "<td>:DATA</td>",
		'tipo': "<span class='badge badge-info'>:TYPE</span>",
		"span": "<span class='table-response'>:SPAN</span>",
		'input':'<input type="hidden" name=":NAME" value=":VALUE">',
		'btnEliminar': "<a href:'#!' class='btn btn-danger' onclick='EliminarPregunta(this)'><i class='fa fa-trash'></i></a>"
	}
	function EliminarPregunta(e){
		e.parentElement.parentElement.remove();
	}
	var id = 0;
	function agregarTabla(){
		var fm = $('#formularioModal');
		if(fm[0].checkValidity()){
			var nodes = fm[0].querySelectorAll('[name]');
			var html = "";
			var opt = "";
			var tipo = "";
			var q = "";
			var rsp = "";
			var sw = true;
			for(var i = 0; i < nodes.length; i++){
				switch(nodes[i].name){
					case 'tipo':
						if(nodes[i].value == 1){
							sw = false;
						}
						opt = tagTable.input.replace(':NAME',"questions[q" + id + "][type_id]");
						opt = opt.replace(':VALUE',nodes[i].value);
						tag = nodes[i];
						tipo = tagTable.tipo.replace(':TYPE',nodes[i].options[nodes[i].value].text);
						html += opt;
						break;
					case 'pregunta':
						opt = tagTable.input.replace(':NAME',"questions[q" + id + "][question]");
						opt = opt.replace(':VALUE',nodes[i].value);
						q = nodes[i].value;
						html += opt;
						break;
					case 'respuesta':
						if(!sw){
							sw = true;
						}
						opt = tagTable.input.replace(':NAME',"questions[q" + id + "][response][]");
						opt = opt.replace(':VALUE',nodes[i].value);
						html += opt;
						rsp += tagTable.span.replace(':SPAN',nodes[i].value);
						break;
				}
			}
			id++;
			var celda = "";
			for(var i = 0; i < tagTable.nCell - 1; i++){
				if( i == 0){
					celda += tagTable.cell.replace(':DATA',html+q);
				}else if(i == 1){
					celda += tagTable.cell.replace(':DATA',rsp);
				}else{
					celda += tagTable.cell.replace(':DATA',tipo);
				}
			}
			if(sw){
				$('#table-encuesta-data').append(tagTable.row.replace(':ROW',celda+tagTable.cell.replace(':DATA',tagTable.btnEliminar)));
			}
		}else{
			fm[0].reportValidity();
		}
	}
</script>

@endsection
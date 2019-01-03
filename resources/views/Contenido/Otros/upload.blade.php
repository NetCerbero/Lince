@extends('adm')

@section('style')
<style>
	.content-body{
	    background: #fff;
	    padding: 20px;
	}
	.dropzone-select{
		border-radius: 20px;
	}
	.dz-preview:hover {
	    transform: scale(1.2);
	}
</style>
<link rel="stylesheet" href="{{ asset('vendors/dropzone/min/dropzone.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendors/toastr/toastr.css') }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> --}}
@endsection

@section('title')
<h4 class="text-muted font-weight-normal mb-0"> Upload <i class="fa fa-cloud-upload"></i></h4> 
@endsection

@section('content')

<div class="alert alert-info" role="alert">
  <strong>Nota:</strong> debe elegir el idioma del contenido que desea subir
</div>

<div class="content-body">
	<form action="{{ route('upload.store') }}" class="dropzone" id="dropzoneMultimedia" method="POST">
        @CSRF()
        {{-- <div class="fallback">
        	<label>Multimedia</label>
            <input name="file" type="file" multiple />
        </div> --}}
    </form>
</div>
<div class="d-flex justify-content-end mt-2">
    <a href="{{ route('contenido.index') }}" class="btn btn-danger mr-2">Atras <i class="fa fa-arrow-circle-left"></i></a>
    <button class="btn btn-primary" onclick="uploadFile()">Subir <i class="fa fa-upload"></i></button>
</div> 
@endsection

@section('script')
<script src="{{ asset('vendors/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/toastr.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
<script>
    var sw = true;
    var gfile = null;
    var gfiles = null;
	Dropzone.options.dropzoneMultimedia = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 5000, // MB
        timeout: 1200000,
        // parallelUploads: 100,
        previewTemplate: `<div class="dz-preview dz-file-preview">
						    <div class="dz-image"><img data-dz-thumbnail /></div>
						    <div class="dz-details">
						        <div class="dz-size"><span data-dz-size></span></div>
						        <div class="dz-filename"><span data-dz-name></span></div>
						    </div>
						    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
						    <div class="dz-error-message"><span data-dz-errormessage></span></div>
						    <select class="dropzone-select mx-1 mt-1" name="language[]" required>
						    	<option value="">Elija el idioma</option>
						    	{!! $languages !!}
						    </select>
						   	<input type="hidden" value="{{ $id }}" name="id">
                            <input type="hidden" value="{{ $type }}" name="content_type">
					      </div>`,
        dictDefaultMessage: "<strong>Arrastre el archivo o dele click aqui. </strong></br> (Solo archivos <strong>.mp4, .webm, .ogg</strong>)",
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictRemoveFile: "Cancelar",
        acceptedFiles: ".mp4, .ogg, .webm",
        init: function () {
            var dropzoneMultimedia = this;
            dropzoneMultimedia.on("success", function (file) {
                dropzoneMultimedia.removeFile(file);
                toastr.success('Se ha subido correctamente el archivo multimedia','Info');
                if(dropzoneMultimedia.files.length){
                    dropzoneMultimedia.processQueue();
                }
            });
            dropzoneMultimedia.on("error", function(file){
            	if (!file.accepted){
                toastr.options = {
                  "closeButton": true,
                  "debug": true,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-bottom-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "500",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                };
            		dropzoneMultimedia.removeFile(file);
					toastr.error("El archivo " + file.name + " es de un formato no permitido", "Error");
            	}
            	console.log(file);
            });
            dropzoneMultimedia.on("sending", function(file, xhr, formData) {
                var str = file.previewElement.querySelector("select").value;
                formData.append("language_id", str);
            });
        }
    };

    function uploadFile()
    {
        let form = $('#dropzoneMultimedia');
        if(form[0].checkValidity()){
            dropzoneMultimedia.dropzone.processQueue();
        }else{
            form[0].reportValidity();
        }
    }
	// var mot = new Toast({
	//   message: 'This is a warning message. You can use this for errors etc',
	//   type: 'danger'
	// });
	// toastr.info('Are you the 6 fingered man?')
	// toastr.info('Are you the 6 fingered man?')
	// toastr.info('Are you the 6 fingered man?')
	// toastr.info('Are you the 6 fingered man?')
</script>
@endsection


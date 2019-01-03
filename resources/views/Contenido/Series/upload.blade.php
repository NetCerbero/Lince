@extends('adm')

@section('style')
<style>
	.content-body{
	    background: #fff;
	    padding: 20px;
	}
	.dropzone-inputs{
		border-radius: 20px;
        /*width: 250px;*/
	}
	/*.dz-preview:hover {
	    transform: scale(1.2);
	}*/
    .dropzone .dz-preview .dz-image{
        width: auto !important;
        height: 250px !important;
    }
    .dropzone .dz-preview .dz-progress{
        left: 38% !important;
        width: 150px !important;
        top: 30% !important;
    }
    .data-extra-img{
        /*background-color: red;*/
        width: 312px;
        background-color: #e4e4e4;
        border-radius: 20px;
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
    <a href="{{ route('serie.index') }}" class="btn btn-danger mr-2">Atras <i class="fa fa-arrow-circle-left"></i></a>
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
    						    <div class="data-extra-img form-row pt-2 mt-1">
                                    <div class="form-group col-12 col-md-6 mb-2">
                                        
                                        <select class="form-control dropzone-inputs" name="language_drop" required>
                                            <option value="">Elija el idioma</option>
                                            {!! $languages !!}
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 mb-2">
                                        
                                        <select class="form-control dropzone-inputs" name="season_drop" required>
                                            <option value="">Elija la temporada</option>
                                            @foreach ($rango as $item)
                                                <option value="{{ $item }}">Temporada {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 mb-2">
                                        
                                        <select class="form-control dropzone-inputs" name="episode_drop" required>
                                            <option value="">Elija el capítulo</option>
                                            @foreach ($rango as $item)
                                                <option value="{{ $item }}">Capítulo {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 mb-2">
                                        
                                        <input type="date" placeholder="Fecha" class="form-control dropzone-inputs" name="date_drop"/>
                                    </div>
                                    <div class="form-group col-12 mb-2">
                                        
                                        <input type="text" placeholder="Nombre del capítulo" class="form-control dropzone-inputs" name="name_drop"/>
                                    </div>
                                    <div class="form-group col-12 mb-2">
                                        
                                        <textarea name="description_drop" cols="30" rows="5" class="form-control dropzone-inputs" placeholder="Descripción o sinopsis"></textarea>
                                    </div>
                                    <input type="hidden" value="{{ $id }}" name="id">
                                    <input type="hidden" value="{{ $type }}" name="content_type">
                                </div>
						      </div>`,
            dictDefaultMessage: "<strong>Arrastre el archivo o dele click aqui. </strong></br> (Solo archivos <strong>.mp4, .webm, .ogg</strong>)",
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictRemoveFile: "Cancelar",
            acceptedFiles: ".mp4, .ogg, .webm",
            init: function () {
                var dropzoneMultimedia = this;
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
                dropzoneMultimedia.on("success", function (file) {
                    dropzoneMultimedia.removeFile(file);
                    toastr.success('Se ha subido correctamente el archivo multimedia','Info');
                    if(dropzoneMultimedia.files.length){
                        dropzoneMultimedia.processQueue();
                    }
                });
                dropzoneMultimedia.on("error", function(file,error){
                	if (!file.accepted){
                		dropzoneMultimedia.removeFile(file);
    					toastr.error("El archivo " + file.name + " es de un formato no permitido", "Error");
                	}
                	console.log("error");
                    console.log(error);
                });
                // dropzoneMultimedia.on("sendingmultiple", function () {
                //     // validarDocs(dropzoneMultimedia.files) 
                // });
                dropzoneMultimedia.on("sending", function(file, xhr, formData) {
                    console.log("llamandose");
                    let tag = file.previewElement.querySelectorAll(".dropzone-inputs");
                    gfile = file;
                    tag.forEach( e =>{
                        if(e.value.length){
                            switch(e.name){
                                case "language_drop":
                                    formData.append('language_id',e.value);
                                    break;
                                case "season_drop":
                                    formData.append('season',e.value);
                                    break;
                                case "episode_drop":
                                    formData.append('episode',e.value);
                                    break;
                                case "date_drop":
                                    formData.append('redate',e.value);
                                    break;
                                case "name_drop":
                                    formData.append('name_episode',e.value);
                                    break;
                                case "description_drop":
                                    formData.append('description_episode',e.value);
                                    break;
                            }
                        }
                    });
                    // formData.append("language_id", str);
                });
                // dropzoneForm.on("successmultiple", function (files, response) {
                //     // Gets triggered when the files have successfully been sent.
                //     // Redirect user or notify of success.
               
                   
                // });
                // dropzoneForm.on("queuecomplete", function (file) {
                  
               
                // });
                // this.on("errormultiple", function (files, response) {
                //     // Gets triggered when there was an error sending the files.
                //     // Maybe show form again, and notify user of error
                // });
                // this.on("maxfilesexceeded", function(file){ 
                //  toastr.error('Cantidad de archivos maxima permitida superada!','Cantidad de Archivos');
                // }); 
            }
        };

    // function parserData(tag){
    //     let data = [];
    //     tag.forEach( e =>{
    //         if(e.value.length){
    //             switch(e.name){
    //                 case "language_drop":
    //                     data.push({'language_id':e.value});
    //                     break;
    //                 case "season_drop":
    //                     data.push({'season':e.value});
    //                     break;
    //                 case "episode_drop":
    //                     data.push({'episode':e.value});
    //                     break;
    //                 case "date_drop":
    //                     data.push({'redate':e.value});
    //                     break;
    //                 case "name_drop":
    //                     data.push({'name_episode':e.value});
    //                     break;
    //                 case "description_drop":
    //                     data.push({'description_episode':e.value});
    //                     break;
    //             }
    //         }
    //     });
    //     return data;
    // }
    function uploadFile()
    {
        let form = $('#dropzoneMultimedia');
        if(form[0].checkValidity()){
            dropzoneMultimedia.dropzone.processQueue();
        }else{
            form[0].reportValidity();
        }
    }
</script>
@endsection


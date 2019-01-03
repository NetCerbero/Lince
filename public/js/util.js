
toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000,
    closeButton: true,
	debug: false,
	progressBar: true,
	preventDuplicates: false,
	positionClass: "toast-bottom-right",
	onclick: null,
	showDuration: "400",
	hideDuration: "1000",
	timeOut: "7000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut"
};
function eliminarRegistro(url, token){
	$.post(url, "_method=delete&_token=" + token, function(data, status){
		console.log("aqui llego la peticion");
		if(status == "success"){
			toastr.success(' ', '¡Elimino correctamente el registro!');
			console.log("eliminado con exito");
		}
    }).fail( e => {
    	console.log(e.responseText);
    	toastr.error(' ', 'Ha ocurrido un error');
    });
}

function actualizarRegistro(url,token,data){
	$.post(url, "_token=" + token + "&" + data, function(data, status){
		console.log("aqui llego la peticion");
		if(status == "success"){
			toastr.success(' ', 'Se ha hecho cambios en el registro');
		}
    }).fail( e => {
    	console.log(e.responseText);
    	toastr.error(' ', 'Ha ocurrido un error');
    });
}
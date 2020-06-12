//Llamar función cuando el documento esté listo
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		//Archivo de petición
		url: '../../views/administrador/buscador/instructoresInhabilitados.php' ,
		//Método de envío
		type: 'POST',
		//Recibimos estructora HTML
		dataType: 'html',
		//Enviamos y recibimos parametros
		data: {consulta: consulta},
	})

	//Cuando se ejecute con exito la función mostrará los datos
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})

	//Si hay un problema mostrará un error
	.fail(function(){
		console.log("error");
	});
}

//Se ejecuta en la caja de busqueda
$(document).on('keyup','#caja_busqueda', function(){
	//Capturamos el valor que tiene #caja_busqueda
	var valor = $(this).val();
	//Si está vacio mostrará todos los datos 
	if (valor != "") {
		buscar_datos(valor);
	}
	//Si no está vacio mostrará la petición 
	else{
		buscar_datos();
	}
});
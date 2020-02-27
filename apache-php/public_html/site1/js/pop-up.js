$(document).ready(function(){
	console.log("Funcionando!");
	
	// Variables
	var editar_flag = 0;

	//Pone todos los input vacios
	$('#form-forall')[0].reset();

	/* AGREGA contenedores */
	$('#form-forall').on('click','#btn-agregar-contenedor',function(){
		numContenedores += 1;
		document.getElementById("conteo_numContenedores").value = numContenedores;

		if (numContenedores == 2) {
			$('div[id^="eliminar-contenedor"]').show();
		}

		var htmlNuevoContenedor = 
        '<div id="contenedores' + numContenedores + '" class="contenedor-flex margen-contenedor">\
            <span id="idContenedor' + numContenedores + '" class="numContenedor">' + numContenedores + '.</span>\
            <input type="text" name="puf-usoContenedor' + numContenedores + '" id="puf-usoContenedor' + numContenedores + '" class="puf-usoContenedor" required/>\
            <div id="eliminar-contenedor' + numContenedores + '" class="button-remove color-remove-red"><span class="icon-remove"></span></div>\
        </div>';
		var aqui = document.getElementById('contenedores' + (numContenedores - 1));
		$(htmlNuevoContenedor).insertAfter(aqui);
		$('#puf-usoContenedor' + numContenedores).css('background-color', '#FFFFFF');
	});

	/* ELIMINAR contenedores */
	$('#form-forall').on('click','.button-remove',function(){
		var inuevo = 0;
		if (numContenedores == 2) {
			// Ocultamos
			$('div[id^="eliminar-contenedor"]').hide();
			// Eliminamos
			var btnID = $(this).attr("id");
			$('#' + btnID).parent().remove();
		}
		else {
			
			// Eliminamos
			var btnID = $(this).attr("id");
			$('#' + btnID).parent().remove();
		}
		for (var i = 1; i <= numContenedores; i++){
			if ($('#contenedores' + i).length) {
				inuevo += 1;
				$('#idContenedor' + i).text(inuevo + '.');
				$('#puf-usoContenedor' + i).prop('name', 'puf-usoContenedor' + inuevo);
				$('#contenedores' + i).prop('id', 'contenedores' + inuevo);
				$('#idContenedor' + i).prop('id', 'idContenedor' + inuevo);
				$('#puf-usoContenedor' + i).prop('id', 'puf-usoContenedor' + inuevo);
				$('#eliminar-contenedor' + i).prop('id', 'eliminar-contenedor' + inuevo);
			}
		}
		// Reducimos el número de contenedores
		numContenedores -= 1;
		document.getElementById("conteo_numContenedores").value = numContenedores;
		console.log(numContenedores);
	});
	
	// ABRIR pop-up
	$(document).on('click', '.btn-ver-mas', function(){
		// DESPLIEGUE
		$('body').css('overflow-y', 'hidden');
		$('#popup-lightbox').css('display','block');
		
		// OCULTAMIENTO
		$('#btn-agregar-contenedor').hide();

		//Cambia el modo de los de campos a SOLO LECTURA
		$('#puf-status').prop('disabled', true);
		$('#puf-tipoVehiculo').prop('disabled', true);
		$('#puf-numEconomico').prop('disabled', true);
		$('#puf-carga').prop('disabled', true);
		$('#puf-cargaUnidad').prop('disabled', true);
		$('#puf-marca').prop('disabled', true);
		$('#puf-modelo').prop('disabled', true);
		$('#puf-usoContenedor1').prop('disabled', true);
		$('#puf-poliza').prop('disabled', true);
		$('#puf-fechaCaducidadSeguro').prop('disabled', true);
		$('#puf-aseguradora').prop('disabled', true);
		$('#puf-condicionesGenerales').prop('disabled', true);
		$('#puf-descripcion').prop('disabled', true);

		//Removemos propiedades
		$('#form-forall').removeAttr("action");
		$('#form-forall').removeAttr("onsubmit");

		// Cambio de propiedades
		//$('#puf-usoContenedor').css('width', '100%');
		$('#puf-tipoVehiculo').addClass('nocss-select');
	});

	// EDITAR
	$('#puf-btn-editar').click(function() {
		editar_flag += 1;
		if (editar_flag == 1) {
			console.log("Dentro de EDIT")
			//Cambia el modo de los campos a ESCRITURA
			$('#puf-status').prop('disabled', false);
			$('#puf-tipoVehiculo').prop('disabled', false);
			$('#puf-numEconomico').prop('disabled', false);
			$('#puf-carga').prop('disabled', false);
			$('#puf-cargaUnidad').prop('disabled', false);
			$('#puf-marca').prop('disabled', false);
			$('#puf-modelo').prop('disabled', false);
			$('#puf-usoContenedor').prop('disabled', false);
			$('#puf-poliza').prop('disabled', false);
			$('#puf-fechaCaducidadSeguro').prop('disabled', false);
			$('#puf-aseguradora').prop('disabled', false);
			$('#puf-condicionesGenerales').prop('disabled', false);
			$('#puf-descripcion').prop('disabled', false);

			for (var i = 1; i <= numContenedores; i++) {
				$('#puf-usoContenedor' + i).prop('disabled', false);
				$('#eliminar-contenedor' + i).show();
			}

			// DESPLIEGUE
			$('#btn-agregar-contenedor').show();

			//Agregamos propiedades
			$('#form-forall').attr('onsubmit', "return false;");
			$('#puf-tipoVehiculo').removeClass('nocss-select');
			$('#puf-tipoVehiculo').addClass('input-50');
			$('#form-forall input[type="text"], #form-forall input[type="number"], #form-forall input[type="date"], #form-forall select, #form-forall textarea').css('background-color', '#FFFFFF');
			
			// Agregamos FUNCIONES
			$('#puf-btn-listo').attr('onclick', "modificar();");
			$('#form-forall').attr('onsubmit', "return false;");
		}
	});

	// CERRAR
	$('#button-cerrar-popup').click(function() {
		$('body').css('overflow-y', 'auto');
		//Pone todos los input vacios
		$('#form-forall')[0].reset();
		document.getElementById("puf-placa").innerHTML = "";
		// Resetea la bandera para editar
		editar_flag = 0;
		
		//Quita el fondo opaco
		$('#popup-lightbox').css('display','none');
		
		// Elimina todos los contenedores excpeto el primero
		for (var i = 2; i <= numContenedores; i++) {
			$('#contenedores' + i).remove();
		}

		// Elimina todos los kilometrajes
		for (var i = 1; i <= numKilometrajes; i++) {
			$('.rm-kilometraje').remove();
		}
		
		numContenedores = 1;

		// Resetea CSS
		$('#form-forall input[type="text"], #form-forall input[type="number"], #form-forall input[type="date"], #form-forall select, #form-forall textarea').css('background-color', '');

		// Resetea select
		$('puf-status').prop('selectedIndex', 0);
		$('puf-tipoVehiculo').prop('selectedIndex', 0);
	});

	// LISTO
	$('#puf-btn-listo').click(function(){
		if(editar_flag == 1) {
			console.log("EDIT");
		}
		else {
			$('body').css('overflow-y', 'auto');
			//Pone todos los input vacios
			$('#form-forall')[0].reset();
			document.getElementById("puf-placa").innerHTML = "";
			// Resetea la bandera para editar
			editar_flag = 0;
			
			//Quita el fondo opaco
			$('#popup-lightbox').css('display','none');
			
			// Elimina todos los contenedores excpeto el primero
			for (var i = 2; i <= numContenedores; i++) {
				$('#contenedores' + i).remove();
			}
			
			numContenedores = 1;

			// Resetea CSS
			$('#form-forall input[type="text"], #form-forall input[type="number"], #form-forall input[type="date"], #form-forall select, #form-forall textarea').css('background-color', '');

			// Resetea select
			$('puf-status').prop('selectedIndex', 0);
			$('puf-tipoVehiculo').prop('selectedIndex', 0);
			console.log("No EDIT")
		}
	});

	$('#button-ver-todo').click(function() {
		window.location.href = "../ADOO_Farmacia_v3202/";
	});
});

    
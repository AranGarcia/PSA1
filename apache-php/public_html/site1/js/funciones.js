var numContenedores = 1;

function llenar_generales_popup(datos){
    $('#puf-placa').val(datos.Placa);
    $('#puf-status').val(datos.Status);
    $('#puf-tipoVehiculo').val(datos.TipoVehiculo);
    $('#puf-numEconomico').val(datos.NumeroEconomico);
    $('#puf-carga').val(datos.CapacidadCarga);
    $('#puf-cargaUnidad').val(datos.UnidadCarga);
	$('#puf-marca').val(datos.Marca);
	$('#puf-modelo').val(datos.Modelo);
	$('#puf-poliza').val(datos.NumeroPoliza);
	$('#puf-fechaCaducidadSeguro').val(datos.CaducidadSeguro);
	$('#puf-aseguradora').val(datos.NombreAseguradora);
	$('#puf-condicionesGenerales').val(datos.CondicionesGenerales);
    $('#puf-descripcion').val(datos.Descripcion);
}

function llenar_contenedores_popup(datos_contenedores){
    var longitud = Object.keys(datos_contenedores).length;
    
    // LLENA EL PRIMER CONTENEDOR
    $('#puf-usoContenedor1').val(datos_contenedores[0]);

    for (var i = 2; i <= longitud; i++) {
        var htmlNuevoContenedor = 
        '<div id="contenedores' + i + '" class="contenedor-flex margen-contenedor">\
            <span id="idContenedor' + i + '" class="numContenedor">' + i + '.</span>\
            <input type="text" name="puf-usoContenedor' + i + '" id="puf-usoContenedor' + i + '" class="puf-usoContenedor" required disabled/>\
            <div id="eliminar-contenedor' + i + '" class="button-remove color-remove-red"><span class="icon-remove"></span></div>\
        </div>';
        var aqui = document.getElementById('contenedores' + (i - 1));
        $(htmlNuevoContenedor).insertAfter(aqui);
        $('#puf-usoContenedor' + i).val(datos_contenedores[i - 1]);
    }

    for (var i = 1; i <= longitud; i++) {
        $('#eliminar-contenedor' + i).hide();
    }

    numContenedores = longitud;
    document.getElementById("conteo_numContenedores").value = numContenedores;
}

function llenar_kilometraje_popup(datos_kilometrajes){
    var longitud = Object.keys(datos_kilometrajes).length;

    for (var i = 1; i <= longitud; i++) {
        var htmlNuevoKilometraje = 
        "<div class='tabla-fila-kilometraje rm-kilometraje'>\
            <p id='fecha-kilom" + i + "' class='tabla-col'></p>\
            <p id='kilom" + i + "' class='tabla-col'></p>\
        </div>";
        $('#tabla-resultados-kilometraje').append(htmlNuevoKilometraje);
        $('#fecha-kilom' + i).text(datos_kilometrajes[i - 1].FechaRevisionKilometraje);
        $('#kilom' + i).text(datos_kilometrajes[i - 1].Kilometraje);
    }

    numKilometrajes = longitud;
}

function modificar(){
    console.log("Modificando...")
    var serializacion = $('#form-forall').serialize()

	$.ajax({
		type:"POST",
        url:"php/Modificar.php",
		data:serializacion,
		beforeSend:function() {
			console.log(serializacion);
		},
		success:function(res){
			if(res==1){
				alert("Vehiculo Recolector modificado con éxito");
				window.location.href = "index.html";
			}
			else{
				alert("ERROR\nEl Vehiculo Recolector no ha sido modificado");
			}
		}
	});
}
function validar(){
	var Placa,NumeroEconomico,Marca,Modelo,CapacidadCarga,UnidadCarga,StatusVehiculo,CondicionesGenerales,NumeroPoliza,
	NombreAseguradora,CaducidadSeguro,TipoVehiculo,Descripcion,Placa,Kilometraje,FechaRevisionKilometraje,Uso;
    
    Placa=document.getElementById("Placa").value;
    NumeroEconomico=document.getElementById("NumeroEconomico").value;
    Marca=document.getElementById("Marca").value;
    Modelo=document.getElementById("Modelo").value;
    CapacidadCarga=document.getElementById("CapacidadCarga").value;
    UnidadCarga=document.getElementById("puf-cargaUnidad").value;
    StatusVehiculo=document.getElementById("StatusVehiculo").value;
    CondicionesGenerales=document.getElementById("CondicionesGenerales").value;
    NumeroPoliza=document.getElementById("NumeroPoliza").value;
    NombreAseguradora=document.getElementById("NombreAseguradora").value;
    CaducidadSeguro=document.getElementById("CaducidadSeguro").value;
    TipoVehiculo=document.getElementById("TipoVehiculo").value;
    Descripcion=document.getElementById("Descripcion").value;
    Kilometraje=document.getElementById("Kilometraje").value;
    FechaRevisionKilometraje=document.getElementById("FechaRevisionKilometraje");
    UsoContenedor=document.getElementById("UsoContenedor").value;
    fecha=new Date();

    if(Placa===""|| NumeroEconomico===""|| Marca===""|| Modelo===""|| CapacidadCarga===""|| UnidadCarga===""|| 
    StatusVehiculo===""|| CondicionesGenerales===""|| NumeroPoliza===""|| NombreAseguradora===""|| 
    CaducidadSeguro===""|| TipoVehiculo===""|| Descripcion===""|| Placa===""|| Kilometraje===""|| 
    FechaRevisionKilometraje===""|| Uso===""){
    	alert("Todos los campos son obligatorios");
	 	return false;
    }
    else{

        alert("vehiculo registrado correctamente");
    }
    


}
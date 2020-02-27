<?php
include 'conexion.php';
$conn=conectar();
$Placa = $_POST["Placa"]; 
$NumeroEconomico = $_POST["NumeroEconomico"];
$Marca =  utf8_decode($_POST["Marca"]);
$Modelo =  utf8_decode($_POST["Modelo"]);
$CapacidadCarga = $_POST["CapacidadCarga"];
$UnidadCarga = $_POST["puf-cargaUnidad"];
//$NumeroContenedores = $_POST["NumeroContenedores"];
$Uso = utf8_decode($_POST["UsoContenedor"]);
$Status = utf8_decode($_POST["StatusVehiculo"]);
$Kilometraje = $_POST["Kilometraje"];
$FechaRevisionKilometraje = $_POST["FechaRevisionKilometraje"];
$CondicionesGenerales =  utf8_decode($_POST["CondicionesGenerales"]);
$NumeroPoliza =  utf8_decode($_POST["NumeroPoliza"]);
$NombreAseguradora =  utf8_decode($_POST["NombreAseguradora"]);
$CaducidadSeguro = $_POST["CaducidadSeguro"];
$TipoVehiculo = utf8_decode($_POST["TipoVehiculo"]);
$Descripcion =  utf8_decode($_POST["Descripcion"]);

$insert="INSERT INTO Vehiculo(Placa, NumeroEconomico, Marca, Modelo, CapacidadCarga,UnidadCarga, NumeroContenedores, Status, CondicionesGenerales,NumeroPoliza, NombreAseguradora, CaducidadSeguro, TipoVehiculo, Descripcion) VALUES('$Placa','$NumeroEconomico','$Marca','$Modelo','$CapacidadCarga','$UnidadCarga','1','$Status','$CondicionesGenerales','$NumeroPoliza','$NombreAseguradora','$CaducidadSeguro','$TipoVehiculo','$Descripcion')";
$insert2="INSERT INTO Kilometraje(Placa,Kilometraje,FechaRevisionKilometraje) VALUES('$Placa','$Kilometraje','$FechaRevisionKilometraje')";
$insert3="INSERT INTO  UsoContenedor(Placa, Uso) values('$Placa', '$Uso')";

$resultado =mysqli_query($conn,$insert);
$resultado2 =mysqli_query($conn,$insert2);
$resultado3 =mysqli_query($conn,$insert3);
if(!$resultado||!$resultado2||!$resultado3){
	echo 'Error en el registro intentelo de nuevo o contacte a soporte :D';
}
else{
	echo 'Vehiculo registrado correctamente';
	echo '<script> alert("Vehiculo registrado correctamente"); </script>';

	header('Location: ../index.html');

}

?>
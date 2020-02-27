<?php
echo "<script>console.log( 'COOL' );</script>";
include 'conexion.php';
$conn=conectar();

$Placa = utf8_decode($_POST["Placa"]); 
$NumeroEconomico = utf8_decode($_POST["NumeroEconomico"]);
$Marca =  utf8_decode($_POST["Marca"]);
$Modelo =  utf8_decode($_POST["Modelo"]);
$CapacidadCarga = utf8_decode($_POST["CapacidadCarga"]);
$UnidadCarga = utf8_decode($_POST["puf-cargaUnidad"]);
$NumeroContenedores = utf8_decode($_POST["conteo_numContenedores"]);
$Status = utf8_decode($_POST["StatusVehiculo"]);
$CondicionesGenerales =  utf8_decode($_POST["CondicionesGenerales"]);
$NumeroPoliza =  utf8_decode($_POST["NumeroPoliza"]);
$NombreAseguradora =  utf8_decode($_POST["NombreAseguradora"]);
$CaducidadSeguro = utf8_decode($_POST["CaducidadSeguro"]);
$TipoVehiculo = utf8_decode($_POST["TipoVehiculo"]);
$Descripcion =  utf8_decode($_POST["Descripcion"]);

$sqlDelete="DELETE FROM UsoContenedor WHERE Placa='$Placa'";
$delete=mysqli_query($conexion,$sqlDelete)

if(!$delete){
    echo "<script>console.log( 'COOL' );</script>";
}

$sqlUpdate="UPDATE vehiculo SET NumeroEconomico='$NumeroEconomico', 
Marca=$Marca, Modelo='$Modelo', CapacidadCarga='$CapacidadCarga', 
UnidadCarga='$UnidadCarga', NumeroContenedores=$NumeroContenedores, 
Status=$Status, CondicionesGenerales='$CondicionesGenerales', 
NumeroPoliza='$NumeroPoliza', NombreAseguradora='$NombreAseguradora', 
CaducidadSeguro='$CaducidadSeguro', TipoVehiculo='$TipoVehiculo', 
Descripcion='$Descripcion' WHERE Placa='$Placa'";
$update=mysqli_query($conexion,$sqlUpdate);

for ($i = 1; $i <= $NumeroContenedores; $i++) {
	$UsoContenedor=utf8_decode($_POST["puf-usoContenedor".$i]);
	$sqlInsert="INSERT INTO UsoContenedor(Placa, Uso) VALUES ('$Placa', '$UsoContenedor')";
	$insert=mysqli_query($conexion, $sqlInsert);
}

echo ($update && $delete && $insert);

?>
<?php 
include 'conexion.php';

$pl = $_POST['placa'];

$Placa = " ";
$NumeroEconomico = " ";
$Marca = " ";
$Modelo = " ";
$CapacidadCarga = " ";
$NumeroContenedores = " ";
$Status = " ";
$Kilometraje = " ";
$FechaRevisionKilometraje = " ";
$CondicionesGenerales = " ";
$NumeroPoliza = " ";
$NombreAseguradora = " ";
$CaducidadSeguro  = " ";
$TipoVehiculo = " ";
$Descripcion = " ";

$conn=conectar();
$sql="SELECT  Placa, NumeroEconomico, Marca, Modelo, CapacidadCarga, UnidadCarga, NumeroContenedores, Status,  CondicionesGenerales, NumeroPoliza, NombreAseguradora, CaducidadSeguro, TipoVehiculo, Descripcion from Vehiculo where Placa='$pl'";



//$sql="select usuario, pass from registrado where correo='$correo'";


	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0){

			

			while($row = mysqli_fetch_assoc($result)) {

			$Placa = $row["Placa"];
			$NumeroEconomico = $row["NumeroEconomico"];
			$Marca = $row["Marca"];
			$Modelo = $row["Modelo"];
			$CapacidadCarga = $row["CapacidadCarga"];
			$UnidadCarga = $row["UnidadCarga"];
			$NumeroContenedores = $row["NumeroContenedores"];
			$Status = $row["Status"];
			//$Kilometraje = $row["Kilometraje"];
			//$FechaRevisionKilometraje = $row["FechaRevisionKilometraje"];
			$CondicionesGenerales = $row["CondicionesGenerales"];
			$NumeroPoliza = $row["NumeroPoliza"];
			$NombreAseguradora = $row["NombreAseguradora"];
			$CaducidadSeguro = $row["CaducidadSeguro"];
			$TipoVehiculo = $row["TipoVehiculo"];
			$Descripcion = $row["Descripcion"];
			
			

			}
			
		}
	




		


header('Content-Type: application/json');

$datos = array(


'Placa' => utf8_encode($Placa),
'NumeroEconomico' => utf8_encode($NumeroEconomico),
'Marca' => utf8_encode($Marca),
'Modelo' => utf8_encode($Modelo),
'CapacidadCarga' => utf8_encode($CapacidadCarga),
'UnidadCarga' => utf8_encode($UnidadCarga),
'NumeroContenedores' => utf8_encode($NumeroContenedores),
	'Status' => utf8_encode($Status),
//'Kilometraje' => utf8_encode($Kilometraje),
//'FechaRevisionKilometraje' => utf8_encode($FechaRevisionKilometraje),
'CondicionesGenerales' => utf8_encode($CondicionesGenerales),
'NumeroPoliza' => utf8_encode($NumeroPoliza),
'NombreAseguradora' => utf8_encode($NombreAseguradora),
'CaducidadSeguro' => utf8_encode($CaducidadSeguro),
'TipoVehiculo' => utf8_encode($TipoVehiculo),
'Descripcion' => utf8_encode($Descripcion)

);
echo json_encode($datos, JSON_FORCE_OBJECT);	






?>
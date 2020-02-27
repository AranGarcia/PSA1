<?php 
include 'conexion.php';

$conn=conectar();

$placa = $_POST['placa'];

$Kilometrajes = array();

$sql="SELECT FechaRevisionKilometraje, Kilometraje FROM Kilometraje WHERE Placa = '$placa' ORDER BY FechaRevisionKilometraje DESC";
$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)  {
		while($line = mysqli_fetch_assoc($result)) {
			//array_push($Kilometrajes, utf8_encode($row["FechaRevisionKilometraje"], $row["Kilometraje"]));
			$Kilometrajes[] = $line;
		}
	}

header('Content-Type: application/json');
echo json_encode($Kilometrajes, JSON_FORCE_OBJECT);
?>
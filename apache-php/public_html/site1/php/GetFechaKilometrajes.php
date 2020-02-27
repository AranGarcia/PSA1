<?php 
include 'conexion.php';
$conn=conectar();

$placa = $_POST['placa'];
$str="";





$FechaRevisionKilometraje = array();

$sql="select FechaRevisionKilometraje from Kilometraje where Placa='$placa' ORDER BY FechaRevisionKilometraje DESC";


	$result2 = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result2)>0){

			while($row = mysqli_fetch_assoc($result)) {
				array_push($FechaRevisionKilometraje,utf8_encode($row["FechaRevisionKilometraje"])  );

			}
			
		}

	




		



header('Content-Type: application/json');
echo json_encode($FechaRevisionKilometraje, JSON_FORCE_OBJECT);


	

//echo $str;








?>
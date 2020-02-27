<?php 
include 'conexion.php';
$conn=conectar();



$StatusVehiculo = array();



$sql="select Status from StatusVehiculo";




	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0){

			while($row = mysqli_fetch_assoc($result)) {
				array_push($StatusVehiculo,utf8_encode($row["Status"])  );
				

			}
			
		}
	

	




		



header('Content-Type: application/json');
echo json_encode($StatusVehiculo, JSON_FORCE_OBJECT);



	

//echo $str;








?>
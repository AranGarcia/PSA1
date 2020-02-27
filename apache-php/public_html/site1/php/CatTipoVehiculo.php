<?php 
include 'conexion.php';
$conn=conectar();



$TipoVehiculo = array();



$sql="select Tipo from TipoVehiculo";




	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0){

			while($row = mysqli_fetch_assoc($result)) {
				array_push($TipoVehiculo,utf8_encode($row["Tipo"])  );
				

			}
			
		}
	

	




		



header('Content-Type: application/json');
echo json_encode($TipoVehiculo, JSON_FORCE_OBJECT);



	

//echo $str;








?>
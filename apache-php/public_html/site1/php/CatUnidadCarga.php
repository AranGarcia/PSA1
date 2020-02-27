<?php 
include 'conexion.php';
$conn=conectar();



$UnidadCarga = array();



$sql="Select Unidad from UnidadCarga";




	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0){

			while($row = mysqli_fetch_assoc($result)) {
				array_push($UnidadCarga,utf8_encode($row["Unidad"])  );
				

			}
			
		}
	

	




		



header('Content-Type: application/json');
echo json_encode($UnidadCarga, JSON_FORCE_OBJECT);



	

//echo $str;








?>
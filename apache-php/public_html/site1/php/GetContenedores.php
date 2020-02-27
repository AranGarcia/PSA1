<?php 
include 'conexion.php';
$conn=conectar();

$placa = $_POST['placa'];
$str="";





$contenedores = array();



$sql="select Uso from UsoContenedor where Placa='$placa'";




	
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)>0){

			while($row = mysqli_fetch_assoc($result)) {
				array_push($contenedores,utf8_encode($row["Uso"])  );
				

			}
			
		}
	

	




		



header('Content-Type: application/json');
echo json_encode($contenedores, JSON_FORCE_OBJECT);



	

//echo $str;








?>
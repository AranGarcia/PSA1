<?php

function conectar(){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "camiones";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexion fallida: ".mysqli_connect_error());
}
else {
	//echo"Conexion okis";
}

return $conn;

}


function convertir($str){
 	$codificacion=mb_detect_encoding($str, "UTF-8", "ISO-8859-1");
 	$str=iconv($codificacion, 'UTF-8', $str);
	return $str;
}

//function despliegaCatalogo($tabla, $campo, $registro)






?>




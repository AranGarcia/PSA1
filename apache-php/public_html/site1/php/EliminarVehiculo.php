<?php
include 'conexion.php';

$conn=conectar();
$Placa= $_POST['Placa'];


$sql="DELETE from Vehiculo where Placa='$Placa'";


echo $result=mysqli_query($conn, $sql);

?>
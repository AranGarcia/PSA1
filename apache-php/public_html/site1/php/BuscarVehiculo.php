<?php
include 'conexion.php';
$conn=conectar();
$salida = "";

$sql="SELECT Placa, NumeroEconomico, TipoVehiculo, CapacidadCarga, NumeroContenedores, NombreAseguradora, NumeroPoliza, CaducidadSeguro, Status from Vehiculo";
	//order by id


	if(isset($_POST['consulta'])){
		//$q=mysql_real_escape_string($_POST['consulta']);
		$q=$_POST['consulta'];
		
		$sql="SELECT Placa, NumeroEconomico, TipoVehiculo, CapacidadCarga, NumeroContenedores, NombreAseguradora, NumeroPoliza, CaducidadSeguro, Status from Vehiculo where Placa LIKE '%".$q."%' OR TipoVehiculo LIKE '%".$q."%'";
	}

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while( $row=mysqli_fetch_row($result) ){
			$salida.="
			<!-- Se genera 1 fila por resultado -->
			<div class='tabla-fila'>
				<!-- Checkbox -->
				<div id='select-".$row[0]."' class='tabla-col chk-select'></div>
				<!-- Resultado: Placa -->
				<button class='btn-ver-mas tabla-col' onclick='GetVehiculo(\"".convertir($row[0])."\")' >".convertir($row[0])."</button>
				<!-- Resultado: Número económico -->
				<p class='tabla-col'>".utf8_encode($row[1])."</p>
				<!-- Resultado: Tipo de vehículo -->
				<p class='tabla-col'>".utf8_encode($row[2])."</p>
				<!-- Resultado: Número de toneladas de carga -->
				<p class='tabla-col'>".utf8_encode($row[3])."</p>
				<!-- Resultado: Número de contenedores -->
				<p class='tabla-col'>".utf8_encode($row[4])."</p>
				<!-- Aseguradora -->
				<p class='tabla-col'>".utf8_encode($row[5])."</p>
				<!-- Resultado: Número de póliza de seguro -->
				<p class='tabla-col'>".utf8_encode($row[6])."</p>
				<!-- Resultado: Fecha de caducidad de seguro -->
				<p class='tabla-col'>".utf8_encode($row[7])."</p>
				<!-- Resultado: Status -->
				<div class='tabla-col'>
					<button id='".utf8_encode($row[8])."' class='btn-status' type='button'><span class='icon-dot'></span>".utf8_encode($row[8])."</button>
				</div>
				<!-- Dar de baja -->
				<button class='btn-baja' onclick='EliminarVehiculo(\"".convertir($row[0])."\")'><span class='icon-remove'></span></button>
			</div>";
		}
				
	}else{
		$salida.="No se encontraron vehiculos";
	}

echo $salida;


?>

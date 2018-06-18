<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					id_cliente, nombre, apellido_paterno, apellido_materno, rfc, fecha_creacion, estatus 
				FROM 
					cliente";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_cliente, $nombre, $apellido_paterno, $apellido_materno, $rfc, $fecha_creacion, $estatus);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_cliente" => $id_cliente,
				"nombre_completo" => $nombre.' '.$apellido_paterno.' '.$apellido_materno,
				"rfc" => $rfc,
				"fecha_creacion" => $fecha_creacion,
				"estatus" => $estatus
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
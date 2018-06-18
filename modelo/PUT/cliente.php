<?PHP

	$id_cliente = $_PUT['id_cliente'];
	$nombre = $_PUT['nombre'];
	$apellido_paterno = $_PUT['apellido_paterno'];
	$apellido_materno = $_PUT['apellido_materno'];
	$rfc = $_PUT['rfc'];
	
	$query = "UPDATE 
					cliente 
				SET 
					nombre = ?,apellido_paterno = ?,apellido_materno = ?,rfc = ? 
				WHERE 
					id_cliente = ?";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("ssssi",$nombre, $apellido_paterno, $apellido_materno, $rfc, $id_cliente);
		
		$stmt->execute();
		
		$stmt->close();
		
	}
	
	$respuesta = 1;
	
?>
<?PHP
	
	$id_cliente = $_GET['id_cliente'];
	
	$respuesta = array();
	
	$query = "SELECT 
					id_cliente, nombre, apellido_paterno, apellido_materno, rfc, fecha_creacion, estatus 
				FROM 
					cliente
				WHERE
					id_cliente = ?";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("i",$id_cliente);
		
		$stmt->execute();
		
		$stmt->bind_result($id_cliente, $nombre, $apellido_paterno, $apellido_materno, $rfc, $fecha_creacion, $estatus);
		
		while($stmt->fetch()){
			
			$respuesta = array(
				"id_cliente" => $id_cliente,
				"nombre" => $nombre,
				"apellido_paterno" => $apellido_paterno,
				"apellido_materno" => $apellido_materno,
				"rfc" => $rfc,
				"fecha_creacion" => $fecha_creacion,
				"estatus" => $estatus
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
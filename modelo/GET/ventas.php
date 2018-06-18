<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					v.id_venta, v.id_cliente, c.nombre, c.apellido_paterno, c.apellido_materno, v.total, v.fecha_creacion
				FROM 
					venta v
				INNER JOIN
					cliente c
				ON
					v.id_cliente = c.id_cliente";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_venta, $id_cliente, $nombre, $apellido_paterno, $apellido_materno, $total, $fecha_creacion);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_venta" => $id_venta,
				"id_cliente" => $id_cliente,
				"nombre_completo" => $nombre.' '.$apellido_paterno.' '.$apellido_materno,
				"total" => $total,
				"fecha_creacion" => $fecha_creacion
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
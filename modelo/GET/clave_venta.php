<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					MAX(id_venta)
				FROM 
					venta
				LIMIT 1";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_venta);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_venta" => $id_venta+1
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
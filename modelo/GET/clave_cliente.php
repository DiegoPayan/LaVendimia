<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					MAX(id_cliente)
				FROM 
					cliente
				LIMIT 1";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_cliente);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_cliente" => $id_cliente+1
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					MAX(id_articulo)
				FROM 
					articulo
				LIMIT 1";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_articulo);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_articulo" => $id_articulo+1
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
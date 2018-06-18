<?PHP

	$id_articulo = $_PUT['id_articulo'];
	$cantidad = $_PUT['cantidad'];
	
	$query = "UPDATE 
					articulo 
				SET 
					existencia = existencia - ?
				WHERE 
					id_articulo = ?";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("ii",$cantidad, $id_articulo);
		
		$stmt->execute();
		
		$stmt->close();
		
	}
	
	$respuesta = 1;
	
?>
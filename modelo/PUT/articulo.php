<?PHP

	$id_articulo = $_PUT['id_articulo'];
	$descripcion = $_PUT['descripcion'];
	$modelo = $_PUT['modelo'];
	$precio = $_PUT['precio'];
	$existencia = $_PUT['existencia'];
	
	$query = "UPDATE 
					articulo 
				SET 
					descripcion = ?, modelo = ?, precio = ?, existencia = ?
				WHERE 
					id_articulo = ?";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("ssiii",$descripcion, $modelo, $precio, $existencia, $id_articulo);
		
		$stmt->execute();
		
		$stmt->close();
		
	}
	
	$respuesta = 1;
	
?>
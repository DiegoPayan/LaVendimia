<?PHP

	$descripcion = $_POST['descripcion'];
	$modelo = $_POST['modelo'];
	$precio = $_POST['precio'];
	$existencia = $_POST['existencia'];
	$estatus = 1;

	$id_articulo = 0;
	
	$query = "INSERT INTO 
					articulo(id_articulo, descripcion, modelo, precio, existencia, fecha_creacion, estatus) 
				VALUES 
					(NULL,?,?,?,?,NOW(),?)";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("ssiii",$descripcion, $modelo, $precio, $existencia, $estatus);
		
		$stmt->execute();
		
		$id_articulo = $stmt-> insert_id;
		
		$stmt->close();
		
	}
	
	$respuesta = $id_articulo;
	
?>
<?PHP

	$nombre = $_POST['nombre'];
	$apellido_paterno = $_POST['apellido_paterno'];
	$apellido_materno = $_POST['apellido_materno'];
	$rfc = $_POST['rfc'];
	$estatus = 1;

	$id_cliente = 0;
	
	$query = "INSERT INTO 
					cliente(id_cliente, nombre, apellido_paterno, apellido_materno, rfc, fecha_creacion, estatus) 
				VALUES 
					(NULL,?,?,?,?,NOW(),?)";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("ssssi",$nombre, $apellido_paterno, $apellido_materno, $rfc, $estatus);
		
		$stmt->execute();
		
		$id_cliente = $stmt-> insert_id;
		
		$stmt->close();
		
	}
	
	$respuesta = $id_cliente;
	
?>
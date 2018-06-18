
<?PHP

	$id_cliente = $_POST['id_cliente'];
	$total = $_POST['total'];
	$plazos = $_POST['plazos'];
	
	$estatus = 1;
	
	$query = "INSERT INTO 
						venta(id_venta, id_cliente, total, plazos, fecha_creacion, estatus) 
					VALUES (NULL,?,?,?,NOW(),?)";
	
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->bind_param("isii",$id_cliente, $total, $plazos, $estatus);
		
		$stmt->execute();
		
		$id_venta = $stmt-> insert_id;
		
		$stmt->close();
		
	}
	
	$articulos = $_POST['articulos'];
	
	foreach($articulos as $array_articulos){
		
		$id_articulo = 0;
		
		$nombre_articulo = $array_articulos['0'];
		$cantidad = $array_articulos['2'];
		
		$query2 = "SELECT
						id_articulo
					FROM
						articulo
					WHERE
						descripcion = ?";

		if($stmt = $mysqli->prepare($query2)){
			
			$stmt->bind_param("s",$nombre_articulo);
			
			$stmt->execute();
			
			$stmt->bind_result($id_articulo);
			
			while($stmt->fetch()){
				
			}
			
			$stmt->close();
			
		}
		
		$query3 = "INSERT INTO 
						venta_detalle(id_venta_detalle, id_venta, id_articulo, cantidad, fecha_creacion, estatus) 
					VALUES 
						(NULL,?,?,?,NOW(),?)";

		if($stmt = $mysqli->prepare($query3)){
			
			$stmt->bind_param("iiii",$id_venta,$id_articulo,$cantidad,$estatus);
			
			$stmt->execute();
			
			$stmt->close();
			
		}
		
		$query4 = "UPDATE 
						articulo
					SET
						existencia = existencia - ?
					WHERE
						id_articulo = ?
					
				";

		if($stmt = $mysqli->prepare($query4)){
			
			$stmt->bind_param("ii",$cantidad,$id_articulo);
			
			$stmt->execute();
			
			$stmt->close();
			
		}
		
	}
	
	$respuesta = 1;
	
?>
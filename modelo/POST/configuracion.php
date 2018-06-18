
<?PHP

	$tasa = $_POST['taza'];
	$enganche = $_POST['enganche'];
	$plazo = $_POST['plazo'];
	
	$consulta_conf = "SELECT COUNT(*) as conf_count FROM configuracion";
	
	if($stmt = $mysqli->prepare($consulta_conf)){
		
		$stmt->execute();
		
		$stmt->bind_result($conf_count);
		
		while($stmt->fetch()){
			
		}
		
		$stmt->close();
		
	}
	
	if($conf_count == 0){
		
		$query = "INSERT INTO 
						configuracion(taza_financiamiento, enganche, plazo_maximo) 
					VALUES 
						(?,?,?)";
		
		if($stmt = $mysqli->prepare($query)){
			
			$stmt->bind_param("sii",$tasa, $enganche, $plazo);
			
			$stmt->execute();
			
			$stmt->close();
			
		}
	
	}else{
	
		$query = "UPDATE 
					configuracion 
				SET 
					taza_financiamiento = ?, enganche = ?, plazo_maximo = ?";
		
		if($stmt = $mysqli->prepare($query)){
			
			$stmt->bind_param("sii",$tasa, $enganche, $plazo);
			
			$stmt->execute();
			
			$stmt->close();
			
		}
		
	}
	
	$respuesta = $tasa;
	
?>
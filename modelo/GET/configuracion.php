
<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					taza_financiamiento, enganche, plazo_maximo 
				FROM 
					configuracion";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($taza_financiamiento, $enganche, $plazo_maximo);
		
		while($stmt->fetch()){
			
			$respuesta = array(
				"taza_financiamiento" => $taza_financiamiento,
				"enganche" => $enganche,
				"plazo_maximo" => $plazo_maximo
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>
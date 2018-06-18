<?PHP
	
	//Conection String
	
	$mysqli = new mysqli('localhost', 'la_vendimia_master', 'qveHxCR367@la_vendimia', 'la_vendimia');

	mysqli_set_charset($mysqli, "utf8");

	//Solo en caso de error al realizar la conexión con los parametros datos
	if(mysqli_connect_errno()){
		
		printf("La conexion fallo: %s\n", mysqli_connect_error());
		exit();
		
	}
?>



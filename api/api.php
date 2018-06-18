<?php
	/**
	* Basic Rest Api
	* @Fecha: 07/05/2018
	* @Version: 1.0
	* @Desarrollador: Payan Lopez Diego
	**/
	
	date_default_timezone_set('America/Mazatlan');

	require ('../modelo/conexion.php');
	
	session_start();
	
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Methods: PUT, GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	header('Content-Type: text/html; charset=utf-8');
	header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
	
	$metodo = $_SERVER['REQUEST_METHOD'];
	
	$ruta = $_SERVER['PATH_INFO'];
	
	if($metodo == 'POST'){
		
		$response = array();
		
		require('../modelo/POST/'.$ruta.'.php');
		
		if (isset($respuesta)) {
			$response["error"] = false;
			$response["message"] = "Almacenado exitoso!";
			$response["data"] = $respuesta;
			$response["status"] = "200";
		} else {
			$response["error"] = true;
			$response["message"] = "Error en el almacenamiento. Por favor intenta nuevamente.";
			$response["data"] = null;
			$response["status"] = "201";
		}
			
		echo json_encode($response);
		
	}else if($metodo == 'GET'){
			
		$response = array();
		
		require('../modelo/GET/'.$ruta.'.php');
		
		if (isset($respuesta)) {
			$response["error"] = false;
			$response["message"] = "Consulta realizada con exito";
			$response["data"] = $respuesta;
			$response["status"] = "200";
		} else {
			$response["error"] = true;
			$response["message"] = "Error al generar la consulta. Por favor intenta nuevamente.";
			$response["data"] = null;
			$response["status"] = "201";
		}
		
		echo json_encode($response);
		
	}else if($metodo == 'PUT'){
		
		parse_str(file_get_contents('php://input'), $_PUT);
		var_dump($_PUT);
		
		$response = array();
		
		require('../modelo/PUT/'.$ruta.'.php');
		
		if (isset($respuesta)) {
			$response["error"] = false;
			$response["message"] = "Almacenado exitos!";
			$response["data"] = $respuesta;
			$response["status"] = "200";
		} else {
			$response["error"] = true;
			$response["message"] = "Error al actualizar datos. Por favor intenta nuevamente.";
			$response["data"] = null;
			$response["status"] = "201";
		}

		echo json_encode($response);
		
	}else {
		
		$response["error"] = true;
		$response["message"] = "Método de envio no permitido.";
		$response["status"] = "405";
			
		echo json_encode($response);
		
	}

?>
	
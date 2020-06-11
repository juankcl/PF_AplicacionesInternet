<?php
require 'ion-database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
	// Extract the data.
	$request = json_decode($postdata);

	// Sanitize.
	$userId = mysqli_real_escape_string($con, trim($request->userid));
	$latitud = mysqli_real_escape_string($con, (float)$request->latitud);
	$longitud = mysqli_real_escape_string($con, (float)$request->longitud);
	
	// Create.
	$sql = "INSERT INTO `usuarios`(`id`,`userId`,`fecha`,`latitud`,`longitud`) 
	VALUES (null,'{$userId}',NOW(),'{$latitud}','{$longitud}')";

	if (mysqli_query($con, $sql)) {
		http_response_code(201);
		$message = [
			'message' => 'Se ha realizado exitosamente la alerta',
			'type' => 'success'
		];
		echo json_encode($message);
	} else {
		$message = [
			'message' => 'Error inesperado',
			'type' => 'danger'
		];
		http_response_code(422);
		echo json_encode($message);
	}
}

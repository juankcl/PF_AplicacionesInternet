<?php
require 'ion-database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
	// Extract the data.
	$request = json_decode($postdata);

	// Sanitize.
	$userId = mysqli_real_escape_string($con, (float)$request->id);
	$latitud = mysqli_real_escape_string($con, (float)$request->latitud);
	$longitud = mysqli_real_escape_string($con, (float)$request->longitud);
	
	// Create.
	$sql = "INSERT INTO `alertas`(`id`,`userId`,`fecha`,`latitud`,`longitud`) VALUES (NULL,{$userId},NOW(),{$latitud},{$longitud})";
	if (mysqli_query($con, $sql)) {
		$message = [
			'message' => 'Se ha realizado exitosamente la alerta',
			'type' => 'success'
		];
		echo json_encode($message);
		die();
	} else {
		$message = [
			'message' => 'Error inesperado',
			'type' => 'danger'
		];
		http_response_code(422);
	}
}
die();

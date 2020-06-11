<?php
require 'ion-database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
	// Extract the data.
	$request = json_decode($postdata);

	// Sanitize.
	$username = mysqli_real_escape_string($con, trim($request->username));
	$pass = mysqli_real_escape_string($con, trim($request->password));

	// Verificar que exista el usuario
	$sql_login = "SELECT * FROM usuarios WHERE username='{$username}'";
	$resultado = mysqli_query($con, $sql_login);
	// Revisar que solo se haya encontrado uno
	if (mysqli_num_rows($resultado) == 1) {
		// Revisar contraseña
		$datos = mysqli_fetch_assoc($resultado);
		if (password_verify($pass, $datos['password'])) {
			http_response_code(201);
			$user = [
				'userId' => $datos['id'],
				'username' => $datos['username'],
				'nombre' => $datos['nombre'],
				'password' => null
			];
			$session = [
				'valid' => true,
				'user' => $user,
				'admin' => $datos['admin']
			];
			echo json_encode($session);
			die();
		}
	}
	// Si no es válido
	$session = [
		'valid' => false,
		'user' => null,
		'admin' => null
	];
	echo json_encode($session);
	die();
}

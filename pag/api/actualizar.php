<?php
include_once 'conection.php';

$Id = $_POST['id'];
$nombre = $_POST['nombre'];
$user = $_POST['username'];
$correo = $_POST['email'];
$pass = $_POST['password'];


$slq_revisar = "Select * from usuarios where activo=1 and username=? and username!=
(Select username from usuarios where id=?)";
$sentencia_revisar = $pdo->prepare($slq_revisar);
$sentencia_revisar->execute(array($user, $Id));
$resultado = $sentencia_revisar->fetch();



if (!$resultado) {

	if (isset($_POST['admin'])) {
		$admin = 1;
	} else {
		$admin = 0;
	}

	$pass = password_hash($pass, PASSWORD_DEFAULT);

	$sql_editar = 'Update usuarios set username=?,password=?,nombre=?,email=?,admin=? where id=?';
	$sentencia_editar = $pdo->prepare($sql_editar);
	$sentencia_editar->execute(array($user, $pass, $nombre, $correo, $admin, $Id));

	$pdo = null;
	$sentencia_editar = null;


	header('location: ../index.php');
}
echo 'Ese nombre de usuario ya está ocupado';
die();

<?php
// Registrar un nuevo usuario

include_once 'conection.php';


$usuario_new = $_POST['username'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass_new = $_POST['password'];
$pass2_new = $_POST['password2'];

// Verificar que no exista el usuario
$sql_user = 'Select * from usuarios where activo=1 and username=? and username!=
(Select username from usuarios where id=?)';
$sentencia_user = $pdo->prepare($sql_user);
$sentencia_user->execute(array($usuario_new,$_SESSION['userId']));
$resultado = $sentencia_user->fetch();

if ($resultado) {
	$errorMsg = 'El usuario ya existe, por favor utilice un nombre de usuario diferente';
} else {
	// Revisar que las dos contraseñas sean iguales
	if ($pass2_new == $pass_new) {
		$pass_new = password_hash($pass_new, PASSWORD_DEFAULT);
		$sql_agregar_user = 'UPDATE usuarios SET nombre=?, username=?, email=?, password=? where id=?';

		$sentencia_agregar_user = $pdo->prepare($sql_agregar_user);
		$sentencia_agregar_user->execute(array($nombre, $usuario_new, $email, $pass_new, $_SESSION['userId']));

		$_SESSION['username'] = $usuario_new;
		$sentencia_agregar_user = null;
		$pdo = null;
		header('Location: index.php');
	} else {
		$errorMsg = "Las contraseñas no son iguales";
	}
}

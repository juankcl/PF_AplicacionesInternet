<?php
include_once 'api/conection.php';

// Registrar un nuevo usuario
if ($_POST && isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password2'])) {

	$usuario_new = $_POST['username'];
	$email = $_POST['email'];
	$pass_new = $_POST['password'];
	$pass2_new = $_POST['password2'];

	// Verificar que no exista el usuario
	$sql_user = 'Select * from usuarios where username=?';
	$sentencia_user = $pdo->prepare($sql_user);
	$sentencia_user->execute(array($usuario_new));
	$resultado = $sentencia_user->fetch();

	if ($resultado) {
		$errorMsg = 'El usuario ya existe, por favor utilice un nombre de usuario diferente';
	} else {
		// Revisar que las dos contraseñas sean iguales
		if ($pass2_new == $pass_new) {
			$pass_new = password_hash($pass_new, PASSWORD_DEFAULT);
			$sql_agregar_user = 'Insert into usuarios (username, email, password, admin) VALUES (?,?,?,0)';

			$sentencia_agregar_user = $pdo->prepare($sql_agregar_user);
			$sentencia_agregar_user->execute(array($usuario_new, $email, $pass_new));

			$sentencia_agregar_user = null;
			$pdo = null;
			header('Location: index.php');
		} else {
			$errorMsg = "Las contraseñas no son iguales";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>eHelp | Registro</title>
</head>

<body class="bg-dark">
	<div class="main">

		<div class="tarjeta p-4">
			<div class="logo text-light pr-3">
				<h1>eHelp</h1>
				<hr>
				<p>
					eHelp es una aplicación de botón de emergencia, al presionar el botón la ubicación del usuario será mandada a nuestros servidores, contactando las autoridades locales que eliga.
				</p>
			</div>
			<div class="texto text-light">
				<small>
					<a href="index.php" class="text-info">< Regresar</a>
				</small>
				<hr>
				<h3 class="form-group">Registrarse</h3>
				<form action="" method="post">
					<?PHP
					if (isset($errorMsg) && $errorMsg) {
						echo "<p style=\"color: red;\">*", htmlspecialchars($errorMsg), "</p>\n\n";
					}
					?>
					<div class="form-group">
						Nombre de usuario:
						<input minlength="3" type="text" name="username" id="" class="form-control" value="<?PHP if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']); ?>">
					</div>
					<div class="form-group">
						Correo electrónico:
						<input minlength="3" type="email" name="email" id="" class="form-control" value="<?PHP if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
					</div>
					<div class="form-group row">
						<div class="col">
							Contraseña:
							<input minlength="3" type="password" name="password" id="" class="form-control" value="<?PHP if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>">
						</div>
						<div class="col">
							Confirmar contraseña:
							<input minlength="3" type="password" name="password2" id="" class="form-control" value="<?PHP if (isset($_POST['password2'])) echo htmlspecialchars($_POST['password2']); ?>">
						</div>
					</div>
					<br>
					<input type="submit" value="Registrarse" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>

</html>
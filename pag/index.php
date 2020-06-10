<?php
session_start();

if ($_POST && isset($_POST['username'], $_POST['password'])) {

	include_once('api/login.php');
} else {
	// Verificar si hay una sesión de usuario
	if (isset($_SESSION['admin'])) {
		if ($_SESSION['admin'] == 1) {
			header('Location: dash.php');
			die();
		}
	}
	if (isset($_SESSION['userId'])) {
		echo $_SESSION['admin'];
		header('Location: boton.php');
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
	<title>eHelp | Iniciar sesión</title>
</head>

<body class="bg-dark">
	<div class="main">
		<div class="tarjeta p-4">
			<div class="logo text-light pr-3">
				<h1>eHelp</h1>
				<hr>
				<p>
					eHelp es una aplicación de botón de emergencia, al presionar el botón la ubicación del usuario será
					mandada a nuestros
					servidores, contactando las autoridades locales que eliga.
				</p>
			</div>
			<div class="texto text-light">
				<h3 class="form-group">Iniciar Sesión</h3>
				<?PHP
				if (isset($errorMsg) && $errorMsg) {
					echo "<p style=\"color: red;\">*", htmlspecialchars($errorMsg), "</p>\n\n";
				}
				?>
				<form onsubmit="return validateForm()" action="" method="post" name="login">
					<div class="form-group">
						Nombre de usuario:
						<input type="text" name="username" id="" class="form-control" value="<?PHP if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']); ?>">
					</div>
					<div class="form-group">
						Contraseña:
						<input type="password" name="password" id="" class="form-control" value="<?PHP if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>">
					</div>
					<br>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Iniciar sesión">
						<small class="form-text text-white">
							¿No tienes cuenta? <a href="registro.php" class="text-info">Registrarse</a>
						</small>
					</div>
				</form>

				<br>
			</div>
		</div>
	</div>
</body>

<script>
	function validateForm() {
		var form = document.forms["login"];
		for (let i = 0; i < form.length; i++) {
			if (form[i].value == "" || form[i].value == null) {
				alert("Por favor ingrese todos los datos");
				return false;
			}
		}
	}
</script>

</html>
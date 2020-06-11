<?php
session_start();

if($_POST) {
	include_once './api/actualizar_user.php';
}

if ($_GET) {
	include_once './api/conection.php';
	$sql_unico = 'Select * from usuarios where id=?';
	$gsent_unico = $pdo->prepare($sql_unico);
	$gsent_unico->execute(array($_SESSION['userId']));
	$resultado_unico = $gsent_unico->fetch();
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
				<small>
					<a href="index.php" class="text-info">< Regresar</a>
				</small>
				<hr>
				<h3 class="form-group">Actualizar datos</h3>
				<?PHP
				if (isset($errorMsg) && $errorMsg) {
					echo "<p style=\"color: red;\">*", htmlspecialchars($errorMsg), "</p>\n\n";
				}
				?>
				<form onsubmit="return validateForm()" action="" method="post" name="actualizar">
					<div class="form-group">
						Nombre:
						<input minlength="3" type="text" name="nombre" id="" class="form-control" value="<?php echo $resultado_unico['nombre'] ?>" required>
					</div>
					<div class=" form-group">
						Nombre de usuario:
						<input minlength="3" type="text" name="username" id="" class="form-control" value="<?php echo $resultado_unico['username'] ?>" required>
					</div>
					<div class="form-group">
						Correo electrónico:
						<input minlength="3" type="email" name="email" id="" class="form-control" value="<?php echo $resultado_unico['email'] ?>" required>
					</div>
					<div class="form-group row">
						<div class="col">
							Contraseña:
							<input minlength="3" type="password" name="password" id="" class="form-control" required>
						</div>
						<div class="col">
							Confirmar contraseña:
							<input minlength="3" type="password" name="password2" id="" class="form-control" required>
						</div>
					</div>
					<input type="submit" value="Actualizar" class="btn btn-primary">
				</form>

				<br>
			</div>
		</div>
	</div>
</body>

<script>
	function validateForm() {
		var form = document.forms["actualizar"];
		for (let i = 0; i < form.length; i++) {
			if (form[i].value == "" || form[i].value == null) {
				alert("Por favor ingrese todos los datos");
				return false;
			}
		}
	}
</script>

</html>
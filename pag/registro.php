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
				<h3 class="form-group">Registrarse</h3>
				<form action="/api/register.php" method="post" target="myIframe">
					<div class="form-group">
						Nombre de usuario:
						<input type="text" name="username" id="" class="form-control">
					</div>
					<div class="form-group">
						Correo electrónico:
						<input type="email" name="email" id="" class="form-control">
					</div>
					<div class="form-group row">
						<div class="col">
							Contraseña:
							<input type="password" name="password" id="" class="form-control">
						</div>
						<div class="col">
							Confirmar contraseña:
							<input type="password" name="password2" id="" class="form-control">
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">
						Registrarse
					</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
<?php
session_start();

include_once 'api/get_alertas.php';

?>


<!DOCTYPE html>

<html lang="en">

<head>
	<title>Document</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="styles.css">

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmhFCWZ4YNHm4_LzzOavKku7M8Ie2wepM"></script>

	<script src="JS/Gps.js"></script>
</head>

<body class="bg-dark">
	<div class="main2">
		<div class="tarjeta2 p-4">
			<div class="row">
				<br>
				Username: <?php echo $_SESSION['username'] ?>
				<br>
				UserId: <?php echo $_SESSION['userId'] ?>
			</div>

			<form action="api/alerta.php" method="post" name="ubicacion" hidden>
				<input type="hidden" name="lat" id="">
				<input type="hidden" name="long" id="">
			</form>

			<div id="mapa" class="row mapa">
				<div id="mapa"></div>
			</div>
			<input type="submit" id="ObtUbicacion" value="HELP" class="row botonH">
			<div class="row">
				<form action="api/logout.php" method="post col">
					<button type="submit">Cerrar sesión</button>
				</form>
				<form action="modificar.php" method="get" class="col">
					<button type="submit">Modificar</button>
				</form>
			</div>
			<div class="row">
				<a href="modificar.php">Modificar</a>
				<a href="eliminar.html">Eliminar cuenta</a>
			</div>
		</div>
		<div class="tarjeta2 p-4 mt-4">
			<?php foreach ($resultado_unico as $alerta) : ?>
				<?php
				echo "<script> Mapa2(";
				echo	(string)$alerta['id'];
				echo	",";
				echo 	(string)$alerta['latitud'];
				echo	",";
				echo	(string)$alerta['longitud'];
				echo 	");</script>";
				?>
				<div class="row">
					<div class="col" id="<?php echo $alerta['id']?>">

					</div>
					<div class="col">
						<?php echo $alerta['fecha'] ?>
						<br>
						<?php echo $alerta['latitud'] ?>
						<br>
						<?php echo $alerta['longitud'] ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</body>

</html>
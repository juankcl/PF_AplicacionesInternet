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
		<div class="tarjeta2 p-4 text-light">
			<div class="row">
				<h1>Username: <?php echo $_SESSION['username'] ?></h1>
			</div>
			<div class="row">
				<h2>Id: <?php echo $_SESSION['userId'] ?></h2>
			</div>

			<form action="api/alerta.php" method="post" name="ubicacion" hidden>
				<input type="hidden" name="lat" id="">
				<input type="hidden" name="long" id="">
			</form>

			<div id="mapa" class="row mapa">
				<div id="mapa"></div>
			</div>
			<div class="ContenedorBoton">
				<input type="submit" id="ObtUbicacion" value="HELP" class="row botonH">
			</div>
			<div class="row">
				<form action="api/logout.php" method="post col">
					<button type="submit" class="btn btn-primary">Cerrar sesión</button>
				</form>
				<form action="modificar.php" method="get" class="col">
					<input type="hidden" name="1" value="1">
					<button type="submit" class="btn btn-primary">Modificar</button>
				</form>
			</div>
			<div class="row pb-5">
				<a href="eliminar.html" class="btn btn-danger">Eliminar cuenta</a>
			</div>
		</div>
		<div class="tarjeta2 p-4 mt-4 text-light">
			<h1>Registros:</h1>

			<script>
				function Mapa2(id, lat, lon) {
					//Si el navegador soporta geolocalizacion
					//console.log(id);
					var coord = {
						lat: lat,
						lng: lon
					}

					var Map = new google.maps.Map(document.getElementById(id), {
						zoom: 15,
						center: coord
					});

					var Marker = new google.maps.Marker({
						position: coord,
						map: Map
					});
				}
			</script>

			<?php foreach ($resultado_unico as $alerta) : ?>
				<div class="row">
					<div class="col" id="<?php echo $alerta['id'] ?>">

					</div>
					<div class="col">
						<?php echo $alerta['fecha'] ?>
						<br>
						<?php echo $alerta['latitud'] ?>
						<br>
						<?php echo $alerta['longitud'] ?>
					</div>
				</div>
				<?php
				echo "<script>
						Mapa2(";
				echo	(string) $alerta['id'];
				echo	",";
				echo 	(string) $alerta['latitud'];
				echo	",";
				echo	(string) $alerta['longitud'];
				echo 	");
						</script>";
				?>
			<?php endforeach ?>
		</div>
	</div>
</body>

</html>
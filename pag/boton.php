<?php 
session_start();
?>


<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Document</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="CSS/Styles.css">

		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmhFCWZ4YNHm4_LzzOavKku7M8Ie2wepM"></script>

		<script src="JS/Gps.js"></script>
	</head>

	<body>
		Hello world!
		<br>
		Username: <?php echo $_SESSION['username']?>
		<br>
		UserId: <?php echo $_SESSION['userId']?>

		<form action="api/subirLocal.php" method="post" onsubmit="return Ubicacion()" name="ubicacion">
			<input type="hidden" name="lat" id="">
			<input type="hidden" name="long" id="">
			
			<div id="ContenedorPrimario">
				<button type="submit" id="ObtUbicacion">HELP</button>
				<div id="mapa"></div>
			</div>
		</form>
		
		<form action="api/logout.php" method="post">
			<button type="submit">Cerrar sesión</button>
		</form>
	</body>
</html>

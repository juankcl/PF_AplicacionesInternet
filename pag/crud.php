<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	Hello superadmin!
	<br>
	Username: <?php echo $_SESSION['username'] ?>
	<br>
	UserId: <?php echo $_SESSION['userId'] ?>
	<form action="api/logout.php" method="post">
		<button type="submit">Cerrar sesión</button>
	</form>
</body>

</html>
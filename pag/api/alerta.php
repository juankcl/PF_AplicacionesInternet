<?php
// Registrar un nuevo usuario

session_start();

include_once 'conection.php';

$lat = $_POST['lat'];
$lon = $_POST['long'];


// Verificar que no exista el usuario
$sql_user ="INSERT INTO `alertas`(`id`,`userId`,`fecha`,`latitud`,`longitud`) VALUES (NULL,?,NOW(),?,?)";
$sentencia_user = $pdo->prepare($sql_user);
$sentencia_user->execute(array($_SESSION['userId'],$lat,$lon));
$resultado = $sentencia_user->fetch();


header('Location: ../index.php');

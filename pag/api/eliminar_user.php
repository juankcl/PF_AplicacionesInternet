<?php

//Cerrar sesión
session_start();

$sql_eliminar = "UPDATE usuarios SET activo=0 WHERE id=?";
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($_SESSION['userId']));

$pdo = null;
$sentencia_editar = null;

session_unset();
session_destroy();

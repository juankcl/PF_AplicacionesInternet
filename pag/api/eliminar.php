<?php
include_once 'conection.php';

$Id = $_POST['id'];
$sql_eliminar = "UPDATE usuarios SET activo=0 WHERE id=?";
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($Id));

$pdo = null;
$sentencia_editar = null;

header('location: ../index.php');

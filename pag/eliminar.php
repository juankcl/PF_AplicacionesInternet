<?php 
    include_once 'api/conection.php';

    $Id = $_GET['id'];
    $sql_eliminar = "Delte from usuarios where Id=?";
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar->execute(array($Id));

    $pdo = null;
    $sentencia_editar = null;

    header('location: index.php');
?>
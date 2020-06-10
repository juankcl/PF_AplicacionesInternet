<?php
    include_once 'api/conection.php';
//editar.php?Id=
//mandar llamar
    $Id= $_GET['Id'];
    $nombre = $_GET['nombre'];
    $user = $_GET['user'];
    $correo = $_GET['correo'];
    $pass = $_GET['pass'];

    include_once 'conection.php';

    $sql_editar = 'Update usuarios set user=?,pass=?,nombre=?,correo=? where Id=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($user,$pass,$nombre,$correo,$Id));

    $pdo = null;
    $sentencia_editar = null;

    header('location: index.php');
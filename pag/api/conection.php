<?php

$link = 'mysql:host=localhost; dbname=ehelp';
$usuario = 'root';
$pass = 'root';


try {
    $pdo = new PDO($link, $usuario, $pass);
} catch (PDOException $error) {
    print "Error: " . $error->getMessage() . "<br>";
    die();
}

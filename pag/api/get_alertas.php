<?php

session_start();
include_once 'conection.php';


$sql_unico = 'Select * from alertas where userId=14';
$gsent_unico = $pdo->prepare($sql_unico);
$gsent_unico->execute(array($_SESSION['userId']));
$resultado_unico = $gsent_unico->fetchAll(\PDO::FETCH_ASSOC);

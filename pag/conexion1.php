<?php
   
    $link ='mysql:host=localhost; dbname = lista';
    $usuario = 'root';
    $pass = 'root';

    try{
        $pdo= new PDO($link,$usuario,$pass);
        echo 'conectado'; 

    }catch(PDOException $e){
        print "Error" . $e->getMessage() . "<br/>";
        die();
    }
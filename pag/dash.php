<?php
// Login


session_start();

include_once 'conection.php';

$sql_user = 'Select * from lista';
$gsent = $pdo->prepare(sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
   <div class="container mt-5">
       <div class="row">
           <div class="col-md-6">
                <?php foreach($resultado as $dato): ?>
                    <div class="alert alert-danger" >
                        <?php echo $dato['Id']?>  
                        -
                        <?php echo $dato['nombre']?>
                        -
                        <?php echo $dato['user']?>
                        -
                        <?php echo $dato['correo']?>
                        -
                        <?php echo $dato['pass']?>
                    </div>
                <?php endforeach ?>
              <div class="col-md-6">
                  <h2>Agregar Usuario</h2>
                  <form method="POST">
                      <input type="text" class= "form-control-mt-3"name="nombre"><input type="text" class= "form-control-mt-3"name="user">
                      <input type="text" class= "form-control-mt-3"name="correo">
                      <input type="text" class= "form-control-mt-3"name="pass">
                      <button class="btn btn-primary mt-3">Agregar</button>
                  </form>
              </div>
           </div>
       </div>
   </div>
  </body>
</html>
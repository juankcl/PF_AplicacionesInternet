<?php
// Login
session_start();

include_once 'api/conection.php';

$sql_user = 'Select * from usuarios';
$gsent = $pdo->prepare(sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

if( $_POST ){
  $nombre= $_POST['nombre'];
  $user= $_POST['user'];
  $correo= $_POST['correo'];
  $pass= $_POST['pass'];

  $sql_agregar = 'Insert into usuarios(user,pass,nombre,correo)';
  $sentencia_agregar= $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($user,$pass,$nombre,$correo));

  header('location: index.php');
}

if($_GET){
  $Id=$_GET['Id'];
  $sql_unico = 'Select * from usuarios where Id=?';
  $gsent_unico = $pdo->prepare($sql_unico);
  $gsent_unico->execute($Id);
  $resultado_unico= $gsent_unico->fetch();
}
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/199cd2948c.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
  </head>
  <body>
  <h1 style="text-align:center,">Dashboard de Usuarios</h1>
   <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
      <?php if(!$_GET): ?>
        <h2>Agregar Usuario</h2>
          <form method="POST">
            <input type="text" class= "form-control-mt-3"name="nombre"><input type="text" class= "form-control-mt-3"name="user">
            <input type="text" class= "form-control-mt-3"name="correo">
            <input type="text" class= "form-control-mt-3"name="pass">
            <button class="btn btn-primary mt-3">Agregar</button>
          </form>
        <?php endif ?>
        <!-- editar form -->
        <?php if($_GET): ?>
          <h2>Editar Usuario</h2>
            <form method="GET" action="editar.php">
              <input type="text" class= "form-control-mt-3" name="nombre" value="<?php echo $resultado_unico['nombre'] ?>" >
              <input type="text" class= "form-control-mt-3"name="user" value="<?php echo $resultado_unico['user'] ?>" >
              <input type="text" class= "form-control-mt-3"name="correo" value="<?php echo $resultado_unico['correo'] ?>">
              <input type="text" class= "form-control-mt-3"name="pass" value="<?php echo $resultado_unico['pass'] ?>">
              <input type="hidden" name="Id" value="<?php echo $resultado_unico['Id'] ?>">
              <button class="btn btn-danger mt-3">Editar</button>
            </form>
        <?php endif ?>
      </div>
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
            <a href="eliminar.php?Id=<?php echo $dato['Id']?>" class="float-right">
            <i class="fas fa-trash"></i>
            </a>

            <a href="index.php?Id=<?php echo $dato['Id']?>" class="float-right ml-3">
            <i class="fas fa-edit"></i>
            </a>
          </div>
        <?php endforeach ?>   
      </div>
    </div>
   </div>
  </body>
</html>

<?php 
  $pdo = null;
  $sentencia_agregar = null;
  $gsent_unico = null;
  $gsent = null;
?>
<?php
// Login
session_start();

include_once 'api/conection.php';

$sql_user = 'Select * from usuarios where activo=1';
$gsent = $pdo->prepare($sql_user);
$gsent->execute();
$resultado = $gsent->fetchAll(\PDO::FETCH_ASSOC);

if ($_GET) {
  $sql_unico = 'Select * from usuarios where id=?';
  $gsent_unico = $pdo->prepare($sql_unico);
  $gsent_unico->execute(array($_GET['id']));
  $resultado_unico = $gsent_unico->fetch();
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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <title>Dashboard</title>
</head>

<body style="background-color: rgb(21, 35, 49); color: white; font-family: 'Roboto', sans-serif;">

  <div class="row" style="background-color:rgb(7, 7, 15); padding-top: 10px; padding-bottom: 8px;">
    <div class="col">
      <h2 style="text-align:center,font">Dashboard de Usuarios</h2>
    </div>
    <div class="col">
      <form action="api/logout.php" method="post" style="padding-right: 10px;">
        <button style="float:inline-end; " class="btn btn-primary type=" submit">Cerrar
          sesión</button>
      </form>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5">
        <!-- Agregar USUARIO -->
        <?php if (!$_GET) : ?>
          <h2>Agregar Usuario</h2>
          <form class="form-group" method="POST" action="api/register.php">
            <!-- Nombre -->
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" id="nombre" placeholder="Ingresa nombre" name="nombre">
            </div>
            <!-- Usuario -->
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Ingresa nombre de usuario" name="username">
            </div>
            <!-- Correo -->
            <div class="form-group">
              <label name="correo">Direccion de Correo</label>
              <input name="correo" class="form-control" placeholder="Ingresa correo">
            </div>
            <!-- Contraseña -->
            <div class="form-group">
              <label>Contraseña</label>
              <input type="password" class="form-control" name="password" placeholder="Ingresa Contraseña">
            </div>
            <!-- Contraseña confirm -->
            <div class="form-group">
              <label>Confirma Contraseña</label>
              <input type="password" class="form-control" name="password2" placeholder="Ingresa Contraseña">
              <small id="emailHelp" class="form-text text-muted">No compartas tu contraseña con nadie más</small>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
          <!-- FIN -->

        <?php endif ?>
        <!-- editar form -->
        <?php if ($_GET) : ?>
          <h2>Editar Usuario</h2>
          <form method="POST" action="api/actualizar.php">
            <!-- Nombre -->
            <div>
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Ingresa nombre" name="nombre" value="<?php echo $resultado_unico['nombre'] ?>">
            </div>
            <!-- Usuario -->
            <div>
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Ingresa nombre de usuario" name="username" value="<?php echo $resultado_unico['username'] ?>">
            </div>
            <!-- Correo -->
            <div>
              <label>Direccion de Correo</label>
              <input name="email" class="form-control" placeholder="Ingresa correo" value="<?php echo $resultado_unico['email'] ?>">
            </div>
            <div>
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Ingresa correo" value="">
            </div>
            <div>
              <label>Admin</label>
              <input type="checkbox" name="admin" class="form-control" placeholder="" value="" <?php if($resultado_unico['admin'] == true) {echo "checked";}?>>
            </div>
            <input type="hidden" name="id" value="<?php echo $resultado_unico['id'] ?>"> <br>
            <button type="submit" class="btn btn-danger">Editar</button>
          </form>
        <?php endif ?>
      </div>
      <div class="col-md-7">
        <?php foreach ($resultado as $dato) : ?>
          <div class="alert alert-danger">
            <?php echo $dato['id'] ?>
            -
            <?php echo $dato['nombre'] ?>
            -
            <?php echo $dato['username'] ?>
            -
            <?php echo $dato['email'] ?>
            <form action="api/eliminar.php" method="POST" class="float-right">
              <button type="submit" class="btn btn-link">
                <i class="fas fa-trash"></i>
              </button>
              <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">
            </form>
            <form action="" method="GET" class="float-right ml-3">
              <button type="submit" class="btn btn-link">
                <i class="fas fa-edit"></i>
              </button>
              <input type="hidden" name="id" value="<?php echo $dato['id'] ?>">
            </form>
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
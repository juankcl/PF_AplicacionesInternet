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

  <title>Dashboard</title>
</head>

<body>
  <h1 style="text-align:center,">Dashboard de Usuarios</h1>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5">
        <?php if (!$_GET) : ?>
          <h2>Agregar Usuario</h2>
          <form method="POST" action="api/register.php">
            <input type="text" class="form-control-mt-3" name="nombre">
            <input type="text" class="form-control-mt-3" name="username">
            <input type="text" class="form-control-mt-3" name="email">
            <input type="text" class="form-control-mt-3" name="password">
            <input type="text" class="form-control-mt-3" name="password2">
            <button class="btn btn-primary mt-3">Agregar</button>
          </form>
        <?php endif ?>
        <!-- editar form -->
        <?php if ($_GET) : ?>
          <h2>Editar Usuario</h2>
          <form method="POST" action="api/actualizar.php">
            <input type="text" class="form-control-mt-3" name="nombre" value="<?php echo $resultado_unico['nombre'] ?>">
            <input type="text" class="form-control-mt-3" name="username" value="<?php echo $resultado_unico['username'] ?>">
            <input type="text" class="form-control-mt-3" name="email" value="<?php echo $resultado_unico['email'] ?>">
            <input type="hidden" name="id" value="<?php echo $resultado_unico['id'] ?>">
            <button class="btn btn-danger mt-3">Editar</button>
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
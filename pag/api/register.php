<?php
// Registrar un nuevo usuario

include_once 'conection.php';

$usuario_new = $_POST['username'];
$email = $_POST['email'];
$pass_new = $_POST['password'];
$pass2_new = $_POST['password2'];

$pass_new = password_hash($pass_new, PASSWORD_DEFAULT);

// Verificar que no exista el usuario
$sql_user = 'Select * from usuarios where username=?';
$sentencia_user = $pdo->prepare($sql_user);
$sentencia_user->execute(array($usuario_new));
$resultado = $sentencia_user->fetch();

if ($resultado) {
    echo 'El usuario ya existe';
    die();
} else {
    // Revisar que las dos contraseñas sean iguales
    if (password_verify($pass2_new, $pass_new)) {
        $sql_agregar_user = 'Insert into usuarios (username, email, password, admin) VALUES (?,?,?,0)';

        $sentencia_agregar_user = $pdo->prepare($sql_agregar_user);
        $sentencia_agregar_user->execute(array($usuario_new, $email, $pass_new));

        $sentencia_agregar_user = null;
        $pdo = null;
        header('Location: ../index.php');
    } else {
        echo "Las contraseñas no son iguales";
    }
}

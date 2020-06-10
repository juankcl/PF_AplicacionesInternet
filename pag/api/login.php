<?php
// Login


session_start();

include_once 'conection.php';

$usuario_login = $_POST['username'];
$login_pass = $_POST['password'];

// Si el usuario no
$sql_user = 'Select * from usuarios where username=?';
$sentencia_user = $pdo->prepare($sql_user);
$sentencia_user->execute(array($usuario_login));
$resultado = $sentencia_user->fetch();

if (!$resultado) {
    echo 'Nombre de usuario o contraseña incorrecta';
    header('Location: ../index.php');
}

if (password_verify($login_pass, $resultado['password'])) {
    $_SESSION['admin'] = $resultado['admin'];
    $_SESSION['userId'] = $resultado['id'];
    $_SESSION['username'] = $usuario_login;
    header('Location: ../index.php');
} else {
    echo 'Nombre de usuario o contraseña incorrecta';
}
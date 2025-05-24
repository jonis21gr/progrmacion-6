<?php
$usuario_valido = "admin";
$contrasena_valida = "1234";

$usuario = $_POST['username'];
$contrasena = $_POST['password'];

if ($usuario === $usuario_valido && $contrasena === $contrasena_valida) {
    echo "<h2>¡Bienvenido, $usuario!</h2>";
} else {
    echo "<h2>Usuario o contraseña incorrectos.</h2>";
}
?>


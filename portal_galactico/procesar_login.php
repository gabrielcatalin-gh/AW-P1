<?php
session_start();

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

if (!file_exists("usuarios.txt")) {
    // Integracion de HTMl en PHP
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Error - Portal Galáctico</title>
        <link rel='stylesheet' href='decoracion/css/estilos.css'>
    </head>
    <body>
        <div class='bienvenida'>
            <h1>⚠️ No hay viajeros registrados aún.</h1>
            <p><a href='registro.php'>Registrar nuevo viajero</a></p>
        </div>
    </body>
    </html>
    ";
    exit;
}

$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
$login_exitoso = false;

foreach ($usuarios as $linea) {
    list($user, $hash) = explode(":", $linea);
    if ($user === $usuario && password_verify($password, $hash)) {
        $login_exitoso = true;
        $_SESSION['usuario'] = $usuario;
        // Guardar la fecha y hora del último acceso
        $fecha_actual = date("d/m/Y H:i:s");
        file_put_contents("accesos.txt", "$usuario|$fecha_actual\n", FILE_APPEND);
        break;
    }
}

if ($login_exitoso) {
    header("Location: bienvenida.php");
    exit;
} else {
    // Integracion de HTML en PHP
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Acceso denegado</title>
        <link rel='stylesheet' href='decoracion/css/estilos.css'>
    </head>
    <body>
        <div class='bienvenida'>
            <h1>❌ Usuario o contraseña incorrectos</h1>
            <p><a href='login.php'>Volver a intentar</a></p>
        </div>
    </body>
    </html>
    ";
}
?>

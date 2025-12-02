<?php
include "adicionales/funciones.php";

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

if (usuario_existe($usuario)) {
    // Integracion de HTMl en PHP
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Error - Registro</title>
        <link rel='stylesheet' href='decoracion/css/estilos.css'>
    </head>
    <body>
        <div class='bienvenida'>
            <h1>❌ El usuario '$usuario' ya está registrado</h1>
            <p><a href='registro.php'>Volver al registro</a></p>
        </div>
    </body>
    </html>
    ";
    exit;
}

$file = fopen("usuarios.txt", "a");
fwrite($file, $usuario . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
fclose($file);
// Integracion de HTMl en PHP
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Registro completado</title>
    <link rel='stylesheet' href='decoracion/css/estilos.css'>
</head>
<body>
    <div class='bienvenida'>
        <h1>✅ Viajero registrado correctamente</h1>
        <p><a href='login.php'>Iniciar sesión</a></p>
    </div>
</body>
</html>
";
?>


<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Buscar el último acceso del usuario
$ultimo_acceso = "No disponible";

if (file_exists("accesos.txt")) {
    $accesos = file("accesos.txt", FILE_IGNORE_NEW_LINES);
    foreach (array_reverse($accesos) as $linea) {
        list($user, $fecha) = explode("|", $linea);
        if ($user === $_SESSION['usuario']) {
            $ultimo_acceso = $fecha;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida - Portal Galáctico</title>
    <link rel="stylesheet" href="decoracion/css/estilos.css">
</head>
<body>
    <h1>¡Bienvenido/a, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Último acceso: <?php echo $ultimo_acceso; ?></p>
    <p>Has accedido exitosamente al Portal Galáctico.</p>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>

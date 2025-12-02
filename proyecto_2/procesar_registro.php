<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <?php

        // Mostrar errores en pantalla
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include "conexion.php";

        $usuario  = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($usuario) || empty($password)) {
        die("<h1>Error ❌</h1><p>Faltan datos en el formulario.</p>");
        }

        // Encriptar contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
        // Comprobar si el usuario ya existe
        $check = $conn->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
        $check->bind_param("s", $usuario);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
        echo "<h1>Error ❌</h1>";
        echo "<p>El usuario ya existe.</p>";
        echo "<p><a href='registro.php'>Volver al registro</a></p>";
        } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        if (!$stmt) {
            die("<h1>Error en prepare ❌</h1><p>{$conn->error}</p>");
        }

        $stmt->bind_param("ss", $usuario, $hash);

        if ($stmt->execute()) {
            echo "<h1>Usuario registrado correctamente!</h1>";
            echo "<p><a href='login.php'>Iniciar sesión</a></p>";
        } else {
            echo "<h1>Error inesperado ❌</h1>";
            echo "<p>Código: {$stmt->errno} - {$stmt->error}</p>";
        }

        $stmt->close();
        }   

        $check->close();
        $conn->close();

        } catch (mysqli_sql_exception $e) {
        echo "<h1>Error inesperado ❌</h1>";
        echo "<p>Código: {$e->getCode()} - {$e->getMessage()}</p>";
        }
        ?>

        










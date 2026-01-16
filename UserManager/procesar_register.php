<?php
require "includes/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $edad = trim($_POST['edad']);

    // Validación básica
    if (empty($nombre) || empty($email) || empty($password) || empty($edad)) {
        die("Todos los campos son obligatorios.");
    }

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en BD
    $sql = "INSERT INTO users (nombre, email, password, edad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $passwordHash, $edad);

    if ($stmt->execute()) {
        // Guardar datos en sesión
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_nombre'] = $nombre;
        $_SESSION['user_rol'] = "user";
        $_SESSION['user_edad'] = $edad;

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

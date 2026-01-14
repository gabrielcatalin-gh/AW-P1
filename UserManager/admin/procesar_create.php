<?php
require "../includes/db.php";

// Verificar que vienen los datos correctos
if (isset($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña
    $rol = $_POST['rol'];

    // Insertar en la base de datos
    $sql = "INSERT INTO users (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $password, $rol);

    if ($stmt->execute()) {
        header("Location: users_list.php");
        exit();
    } else {
        echo "Error al crear el usuario: " . $stmt->error;
    }
} else {
    die("Datos incorrectos.");
}

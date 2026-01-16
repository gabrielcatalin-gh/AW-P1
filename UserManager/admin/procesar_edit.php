<?php
require "../includes/db.php";

// Verificar que viene un ID de usuario
if (isset($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['rol'], $_POST['edad'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $edad = $_POST['edad'];

    // Actualizar en la base de datos
    $sql = "UPDATE users SET nombre = ?, email = ?, rol = ?, edad = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $email, $rol, $edad, $id);

    if ($stmt->execute()) {
        header("Location: users_list.php");
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }
} else {
    die("Datos incorrectos.");
}

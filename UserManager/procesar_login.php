<?php
require "includes/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Buscar usuario
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $user = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $user['password'])) {

            // Crear sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nombre'] = $user['nombre'];
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_edad'] = $user['edad'];

            header("Location: dashboard.php");
            exit();
        } else {
            die("Contraseña incorrecta.");
        }
    } else {
        die("No existe un usuario con ese email.");
    }
}

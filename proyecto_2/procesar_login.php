<?php
session_start();
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

echo '<link rel="stylesheet" href="style.css">';
echo '<div class="container">';

$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenida.php");
        exit;
    } else {
        echo "<h1>Contraseña incorrecta ❌</h1>";
        echo "<p class='msg'><a href='login.php'>Reintentar</a></p>";
    }
} else {
    echo "<h1>Usuario no encontrado ❌</h1>";
    echo "<p class='msg'><a href='registro.php'>Crear cuenta</a></p>";
}

echo '</div>';

$stmt->close();
$conn->close();
?>


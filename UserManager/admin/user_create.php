<?php
require "../includes/auth.php";
require_admin(); // Solo admin puede ver esta página
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<h2>Crear Nuevo Usuario</h2>

<form action="procesar_create.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Contraseña:</label>
    <input type="password" name="password" required><br>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select><br>

    <button type="submit">Crear Usuario</button>
</form>

</body>
</html>

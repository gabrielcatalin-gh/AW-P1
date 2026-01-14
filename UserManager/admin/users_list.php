<?php
require "../includes/auth.php";
require_admin(); // Solo admin puede ver esta página
require "../includes/db.php";

// Obtener lista de usuarios
$sql = "SELECT * FROM users";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<h2>Gestión de Usuarios</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>

    <?php while ($usuario = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
            <td>
                <a href="user_edit.php?id=<?php echo $usuario['id']; ?>">Editar</a> | 
                <a href="user_delete.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="user_create.php">Crear Nuevo Usuario</a>
<a href="../logout.php">Cerrar sesión</a>

</body>
</html>

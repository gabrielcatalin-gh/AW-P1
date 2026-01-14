<?php
require "../includes/auth.php";
require_admin(); // Solo admin puede ver esta página
require "../includes/db.php";

// Obtener datos del usuario a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        die("Usuario no encontrado.");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<h2>Editar Usuario</h2>

<form action="procesar_edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required><br>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="user" <?php echo $usuario['rol'] === 'user' ? 'selected' : ''; ?>>Usuario</option>
        <option value="admin" <?php echo $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
    </select><br>

    <button type="submit">Actualizar Usuario</button>
</form>

</body>
</html>

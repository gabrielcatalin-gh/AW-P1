<?php
require "../includes/auth.php";
require_admin(); // Solo admin puede ver esta página
require "../includes/db.php";

// Verificar que se pasó un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar usuario
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: users_list.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }
}
?>

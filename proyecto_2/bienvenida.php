<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenida</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="container">
    <h1>Bienvenid@, <?php echo htmlspecialchars($_SESSION['usuario']);?>!</h1>
    <p>Has iniciado sesión correctamente.</p>
    <p class="text-small"><a href="logout.php">Cerrar sesión</a></p>
  </div>
</body>
</html>





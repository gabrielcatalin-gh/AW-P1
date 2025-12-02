<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="container">
    <h1>Iniciar sesión</h1>
    <form action="procesar_login.php" method="post">
      <label>Usuario:</label>
      <input type="text" name="usuario" required>
      
      <label>Contraseña:</label>
      <input type="password" name="password" required>
      
      <button type="submit">Entrar</button>
    </form>
    <p class="text-small">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
  </div>
</body>
</html>





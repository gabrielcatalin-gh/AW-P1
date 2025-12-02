<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Portal Galáctico</title>
    <link rel="stylesheet" href="decoracion/css/estilos.css">
</head>
<body>
    <h1>Registro de Viajero Espacial</h1>
    <form action="procesar_registro.php" method="post">
        <label>Nombre de usuario:</label>
        <input type="text" name="usuario" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Unirse al portal</button>
    </form>
    <p>¿Ya eres viajero? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>

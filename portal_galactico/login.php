<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Portal Galáctico</title>
    <link rel="stylesheet" href="decoracion/css/estilos.css">
</head>
<body>
    <h1>Acceso al Portal Galáctico</h1>
    <form action="procesar_login.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Despegar</button>
    </form>
    <p>¿Nuevo viajero? <a href="registro.php">Regístrate aquí</a></p>
</body>
</html>

<?php
// No hay PHP aquí excepto esta línea opcional para iniciar sesión
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/validacion.js" defer></script>
</head>
<body>

<h2>Registro de Usuario</h2>

<form action="procesar_register.php" method="POST" id="formRegister">
    <label>Nombre:</label>
    <input type="text" name="nombre" id="nombre">

    <label>Email:</label>
    <input type="email" name="email" id="email">

    <label>Contraseña:</label>
    <input type="password" name="password" id="password">

    <label>Edad</label>
    <input type="number" name="edad" id="edad">


    <button type="submit">Registrarse</button>
</form>

<div id="errores" style="color:red;"></div>
<a href="login.php">¿Ya tienes cuenta?</a>

</body>
</html>

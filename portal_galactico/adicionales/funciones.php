<?php
// Función para comprobar si un usuario ya existe en usuarios.txt
function usuario_existe($usuario) {
    if (!file_exists("usuarios.txt")) return false;
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $linea) {
        list($user, $hash) = explode(":", $linea);
        if ($user === $usuario) {
            return true;
        }
    }
    return false;
}
?>


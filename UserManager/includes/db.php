<?php
$host = "localhost";
$user = "gabriel";
$pass = "P@ssw0rd";
$dbname = "usemanager";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// establecer charset para evitar problemas con acentos
$conn->set_charset("utf8");
?>

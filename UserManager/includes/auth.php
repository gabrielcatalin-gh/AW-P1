<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirige si NO hay usuario logado
function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Redirige si el usuario NO es admin
function require_admin() {
    if (!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] !== 'admin') {
        header("Location: ../dashboard.php");
        exit();
    }
}
?>

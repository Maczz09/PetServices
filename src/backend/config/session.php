<?php
// src/backend/config/session.php

// Configuraciones de seguridad para las sesiones
ini_set('session.use_strict_mode', 1);
session_start();
session_regenerate_id(true);

// Verificar si el usuario está autenticado
$isLoggedIn = false;
if (isset($_SESSION['idusuario'])) {
    $isLoggedIn = true;
    $idusuario = $_SESSION['idusuario'];
}

?>


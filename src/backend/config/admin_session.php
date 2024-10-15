<?php
// src/backend/config/admin_session.php

// Configuraciones de seguridad para las sesiones
ini_set('session.use_strict_mode', 1);
session_start();
session_regenerate_id(true);

// Verificar si el usuario está autenticado y si tiene el rol de administrador
if (!isset($_SESSION['idusuario']) || $_SESSION['idrol'] != 1) {
    header("Location: login.php");
    exit();
}

// El usuario está autenticado y tiene el rol de administrador
?>


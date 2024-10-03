<?php
// src/backend/config/admin_session.php
session_start();

// Verificar si el usuario está autenticado y si tiene el rol de administrador
if (!isset($_SESSION['idusuario']) || $_SESSION['idrol'] != 1) {
    header("Location: login.php");
    exit();
}
?>

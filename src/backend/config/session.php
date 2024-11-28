<?php
// src/backend/config/session.php
session_start();
if (!isset($_SESSION['idusuario'])) {
    $isLoggedIn = false;
} else {
    $isLoggedIn = true;
    $idusuario = $_SESSION['idusuario'];
}

?>

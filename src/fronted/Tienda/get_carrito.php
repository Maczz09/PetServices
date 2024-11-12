<?php
session_start();
header('Content-Type: application/json');

// Verifica si el carrito está presente en la sesión
if (isset($_SESSION['carrito'])) {
    // Devuelve el contenido del carrito en formato JSON
    echo json_encode(array_values($_SESSION['carrito']));
} else {
    // Devuelve un arreglo vacío si el carrito no existe
    echo json_encode([]);
}
?>

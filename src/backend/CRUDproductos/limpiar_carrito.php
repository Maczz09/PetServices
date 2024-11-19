<?php
// Archivo: backend/CRUDproductos/limpiar_carrito.php
session_start();
$response = array();

try {
    // Limpia completamente el carrito
    $_SESSION['carrito'] = array();
    $response['status'] = 'success';
    $response['message'] = 'Carrito limpiado exitosamente';
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Error al limpiar el carrito: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
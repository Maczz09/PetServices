<?php
session_start();
header('Content-Type: application/json');

if (isset($_POST['id_producto'])) {
    $id_producto = $_POST['id_producto'];

    // Asegúrate de que la variable de sesión del carrito exista
    if (isset($_SESSION['carrito'])) {
        // Busca el producto en el carrito
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['id_producto'] == $id_producto) {
                // Eliminar el producto del carrito
                unset($_SESSION['carrito'][$key]);
                echo json_encode(['status' => 'success']);
                exit;
            }
        }
    }
    echo json_encode(['status' => 'error', 'message' => 'Producto no encontrado en el carrito.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de producto no proporcionado.']);
}
?>
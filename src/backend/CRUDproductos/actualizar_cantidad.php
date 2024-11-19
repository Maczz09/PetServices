<?php
session_start();
include('../../backend/config/Database.php');

$response = ['status' => 'error', 'message' => 'Error al actualizar la cantidad'];

if (isset($_POST['id_producto']) && isset($_POST['cambio'])) {
    $idProducto = $_POST['id_producto'];
    $cambio = $_POST['cambio'];
    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id_producto'] == $idProducto) {
            $nuevaCantidad = $item['cantidad'] + $cambio;
            if ($nuevaCantidad > 0) {
                $item['cantidad'] = $nuevaCantidad;
                $response = ['status' => 'success', 'message' => 'Cantidad actualizada'];
            } else {
                // Si la cantidad llega a 0, eliminar el item
                $key = array_search($item, $_SESSION['carrito']);
                unset($_SESSION['carrito'][$key]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                $response = ['status' => 'success', 'message' => 'Producto eliminado'];
            }
            break;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
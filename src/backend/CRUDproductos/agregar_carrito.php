<?php
session_start();
header('Content-Type: application/json');

// Verifica si el método es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $cantidad = 1;

    // Inicializa el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Busca si el producto ya está en el carrito
    $existe = false;
    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id_producto'] == $id_producto) {
            $producto['cantidad'] += $cantidad;
            $existe = true;
            break;
        }
    }

    // Si no existe, agrégalo
    if (!$existe) {
        $_SESSION['carrito'][] = [
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre_producto,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => $cantidad
        ];
    }

    echo json_encode(['status' => 'success', 'message' => 'Producto agregado al carrito.']);
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);

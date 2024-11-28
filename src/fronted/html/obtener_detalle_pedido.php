<?php
session_start();
include('../../backend/config/Database.php');
include('Dashboard.php'); // Asegúrate de que la ruta sea correcta

$database = new Database();
$conexion = $database->getConexion();

if (isset($_GET['pedido_id'])) {
    $pedido_id = $_GET['pedido_id'];

    $dashboard = new Dashboard($conexion);
    $detalles = $dashboard->obtenerDetallePedido($pedido_id);

    // Convertir los valores a números
    foreach ($detalles as &$detalle) {
        $detalle['precio_unitario'] = floatval($detalle['precio_unitario']);
        $detalle['subtotal'] = floatval($detalle['subtotal']);
    }

    // Devolver los detalles en formato JSON
    echo json_encode($detalles);
} else {
    echo json_encode([]);
}
?>
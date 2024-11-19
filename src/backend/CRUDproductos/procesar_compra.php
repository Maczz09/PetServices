<?php
session_start();
include 'conexion.php'; // Archivo donde configuras tu conexión a la BD

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $paypal_email = $_POST['paypal_email'];

    // Insertar la orden en la base de datos (tabla Orden)
    $query = "INSERT INTO Orden (nombre_cliente, email, direccion, telefono, paypal_email, total) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssd", $nombre, $email, $direccion, $telefono, $paypal_email, $totalCompra);
    $totalCompra = 0;

    // Calcular el total y ejecutar la inserción
    foreach ($_SESSION['carrito'] as $producto) {
        $totalCompra += $producto['precio'] * $producto['cantidad'];
    }
    $stmt->execute();

    // Obtener el ID de la orden recién creada
    $id_orden = $conn->insert_id;

    // Insertar cada producto del carrito en la tabla DetalleOrden
    foreach ($_SESSION['carrito'] as $producto) {
        $query_detalle = "INSERT INTO DetalleOrden (id_orden, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $conn->prepare($query_detalle);
        $stmt_detalle->bind_param("iiid", $id_orden, $producto['id_producto'], $producto['cantidad'], $producto['precio']);
        $stmt_detalle->execute();
    }

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    echo "Compra realizada con éxito. Gracias por su compra!";
    header("Location: confirmacion.php"); // Redirigir a una página de confirmación
    exit();
} else {
    echo "Error: método de solicitud no válido.";
}
?>

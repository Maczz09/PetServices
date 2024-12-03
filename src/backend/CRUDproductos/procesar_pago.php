<?php
session_start();
include('../../backend/config/Database.php');

$database = new Database();
$conexion = $database->getConexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    // Obtener información del pedido
    $total = $_POST['total'];
    $numero_orden = $_POST['numero_orden'];
    $metodo_pago = $_POST['metodo_pago'];
    $direccion_envio = isset($_POST['direccion']) ? $_POST['direccion'] : null; // Permitir que la dirección sea nula

    // Si la dirección de envío es nula, no se lanza excepción, se guarda como NULL en la base de datos
    // No es necesario hacer nada más si la dirección es nula, se manejará como NULL al insertar en la base de datos

    // Iniciar transacción
    $conexion->begin_transaction();

    try {
        // Insertar pedido (asumiendo que tienes un usuario en sesión)
        $usuario_id = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : null;
        
        if ($usuario_id === null) {
            throw new Exception("Usuario no autenticado");
        }

        // Modificar consulta para incluir la dirección (que puede ser NULL)
        $sql_pedido = $conexion->prepare("INSERT INTO pedidos (idusuario, total, metodo_pago, estado, direccion_envio) VALUES (?, ?, ?, 'pendiente', ?)");
        $sql_pedido->bind_param("idss", $usuario_id, $total, $metodo_pago, $direccion_envio);
        $sql_pedido->execute();
        $pedido_id = $conexion->insert_id;

        // Insertar detalles del pedido desde el carrito de sesión
        $sql_detalle = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
        
        foreach ($_SESSION['carrito'] as $producto) {
            $producto_id = $producto['id_producto'];
            $cantidad = $producto['cantidad'];
            $precio_unitario = $producto['precio'];
            $subtotal = $cantidad * $precio_unitario;

            $sql_detalle->bind_param("iiidd", $pedido_id, $producto_id, $cantidad, $precio_unitario, $subtotal);
            $sql_detalle->execute();
        }

        // Limpiar carrito
        unset($_SESSION['carrito']);

        // Confirmar transacción
        $conexion->commit();

        // Redirigir a la página de confirmación con el ID del pedido
        header("Location: confirmacion_pedido.php?orden=$pedido_id");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        // Mostrar error de manera más amigable
        echo "<div class='alert alert-danger'>Error al procesar el pedido: " . htmlspecialchars($e->getMessage()) . "</div>";
        exit();
    }
} else {
    // Redirigir si no hay productos en el carrito
    header('Location: ../../fronted/tienda/petshop.php');
    exit();
}
?>

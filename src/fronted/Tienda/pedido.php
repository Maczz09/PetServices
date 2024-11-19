<?php
class Pedido {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function registrarPedido($idUsuario, $total, $direccion, $metodoPago) {
        $sql = "
            INSERT INTO pedidos (idusuario, fecha_pedido, estado, total, direccion_envio, metodo_pago)
            VALUES (?, NOW(), 'pendiente', ?, ?, ?)
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("idss", $idUsuario, $total, $direccion, $metodoPago);
        $stmt->execute();
        return $this->conexion->insert_id; // Devuelve el ID del nuevo pedido
    }

    public function registrarDetallePedido($idPedido, $productosCarrito) {
        $sql = "
            INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal)
            VALUES (?, ?, ?, ?, ?)
        ";
        $stmt = $this->conexion->prepare($sql);

        foreach ($productosCarrito as $producto) {
            $precioConDescuento = $producto['precio'] - ($producto['precio'] * ($producto['descuento'] / 100));
            $subtotal = $precioConDescuento * $producto['cantidad'];
            $stmt->bind_param("iiidd", $idPedido, $producto['id_producto'], $producto['cantidad'], $precioConDescuento, $subtotal);
            $stmt->execute();
        }
    }
}
?>

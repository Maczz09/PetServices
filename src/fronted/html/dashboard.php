<?php
class Dashboard {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerPedidos($usuario_id) {
        $sql = "SELECT id_pedido, fecha_pedido, total, estado FROM pedidos WHERE idusuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerDetallePedido($pedido_id) {
        $sql = "SELECT dp.id_producto, p.nombre_producto, dp.cantidad, dp.precio_unitario, dp.subtotal
                FROM detalle_pedido dp
                JOIN productos p ON dp.id_producto = p.id_producto
                WHERE dp.id_pedido = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $pedido_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
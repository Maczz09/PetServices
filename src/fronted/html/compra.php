<?php
session_start();
include('../../backend/config/Database.php');
include('../../backend/CRUDproductos/dashboard.php'); // Asegúrate de que la ruta sea correcta

$database = new Database();
$conexion = $database->getConexion();

$usuario_id = $_SESSION['idusuario']; // Asegúrate de que el ID del usuario esté en la sesión
$dashboard = new Dashboard($conexion);
$pedidos = $dashboard->obtenerPedidos($usuario_id);

include '../html/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Mis Compras</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Fecha de Pedido</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?php echo htmlspecialchars($pedido['id_pedido']); ?></td>
                <td><?php echo htmlspecialchars($pedido['fecha_pedido']); ?></td>
                <td>S/ <?php echo number_format($pedido['total'], 2); ?></td>
                <td><?php echo htmlspecialchars($pedido['estado']); ?></td>
                <td>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalDetalle" data-id="<?php echo $pedido['id_pedido']; ?>">Ver Detalles</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetalleLabel">Detalles del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detallePedido">
                <!-- Aquí se cargarán los detalles del pedido -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalDetalle = document.getElementById('modalDetalle');
        modalDetalle.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Botón que abrió el modal
            const pedidoId = button.getAttribute('data-id'); // Extraer el ID del pedido

            // Hacer una solicitud AJAX para obtener los detalles del pedido
            fetch(`../../backend/CRUDproductos/obtener_detalle_pedido.php?pedido_id=${pedidoId}`)
                .then(response => response.json())
                .then(data => {
                    let detallesHtml = '<table class="table"><thead><tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr></thead><tbody>';
                    data.forEach(detalle => {
                        detallesHtml += `<tr>
                            <td>${detalle.nombre_producto}</td>
                            <td>${detalle.cantidad}</td>
                            <td>S/ ${detalle.precio_unitario.toFixed(2)}</td>
                            <td>S/ ${detalle.subtotal.toFixed(2)}</td>
                        </tr>`;
                    });
                    detallesHtml += '</tbody></table>';
                    document.getElementById('detallePedido').innerHTML = detallesHtml;
                })
                .catch(error => {
                    console.error('Error al cargar los detalles del pedido:', error);
                    document.getElementById('detallePedido').innerHTML = '<p>Error al cargar los detalles del pedido.</p>';
                });
        });
    });
    
</script>
</body>
</html>
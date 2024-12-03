<?php
// Incluir archivo de conexión
include '../../backend/config/admin_session.php';
include('../../backend/config/Database.php');

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$con = $database->getConexion();

// Leer Pedidos
$sql_pedidos = $con->prepare("SELECT * FROM pedidos");
$sql_pedidos->execute();
$pedidos = $sql_pedidos->get_result()->fetch_all(MYSQLI_ASSOC);

// Actualizar Estado del Pedido
if (isset($_POST['update_status'])) {
    $id_pedido = $_POST['id_pedido'];
    $nuevo_estado = $_POST['estado'];

    $sql_update = $con->prepare("UPDATE pedidos SET estado = ? WHERE id_pedido = ?");
    $sql_update->bind_param("si", $nuevo_estado, $id_pedido);
    $sql_update->execute();

    header("Location: administrarPedidos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../images/perro.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<body class="min-h-screen flex flex-col bg-gray-100">
    <div class="sidebar2">
        <?php include 'dashboard_sidebar.php'; ?>
    </div>
    <!-- Sidebar -->
    <?php include 'dashboard_sidebar.php'; ?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Dashboard de Pedidos</h2>

   

        <!-- Tabla de Pedidos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Método de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $pedido['id_pedido'] ?></td>
                    <td><?= $pedido['idusuario'] ?></td>
                    <td><?= $pedido['fecha_pedido'] ?></td>
                    <td><?= ucfirst($pedido['estado']) ?></td>
                    <td>$<?= number_format($pedido['total'], 2) ?></td>
                    <td><?= $pedido['metodo_pago'] ?></td>
                    <td>
                        <!-- Botón Ver Detalles -->
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal" 
                                onclick='viewDetails(<?= json_encode($pedido) ?>)'>Ver</button>
                        
                        <!-- Botón Editar Estado -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 
                                onclick='fillEditModal(<?= json_encode($pedido) ?>)'>Editar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Ver Detalles -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles del Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID Pedido:</strong> <span id="view_id"></span></p>
                    <p><strong>Usuario:</strong> <span id="view_usuario"></span></p>
                    <p><strong>Fecha:</strong> <span id="view_fecha"></span></p>
                    <p><strong>Total:</strong> $<span id="view_total"></span></p>
                    <p><strong>Dirección:</strong> <span id="view_direccion"></span></p>                    
                    <p><strong>Método de Pago:</strong> <span id="view_metodo"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Estado -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Estado del Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pedido" id="edit_id">
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="edit_estado">
                            <option value="pendiente">Pendiente</option>
                            <option value="procesando">Procesando</option>
                            <option value="completado">Completado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update_status" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Rellenar modal de detalles
        function viewDetails(pedido) {
            document.getElementById('view_id').innerText = pedido.id_pedido;
            document.getElementById('view_usuario').innerText = pedido.idusuario;
            document.getElementById('view_fecha').innerText = pedido.fecha_pedido;
            document.getElementById('view_total').innerText = pedido.total;
            document.getElementById('view_direccion').innerText = pedido.direccion_envio;           
            document.getElementById('view_metodo').innerText = pedido.metodo_pago;
        }
 
        // Rellenar modal de edición
        function fillEditModal(pedido) {
            document.getElementById('edit_id').value = pedido.id_pedido;
            document.getElementById('edit_estado').value = pedido.estado;
        }
    </script>
    
</body>
</html>

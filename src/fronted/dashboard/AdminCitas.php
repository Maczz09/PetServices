<?php
// Conexión a la base de datos
include('../../backend/config/Database.php');

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Leer las citas agendadas
$query = "SELECT c.idcita, c.idusuario, c.idservicio, c.fecha_cita, c.hora_cita, c.descripcion, c.estado, u.nombre AS nombre_usuario, s.nombre_servicio
          FROM citas c
          JOIN usuarios u ON c.idusuario = u.idusuario
          JOIN servicios s ON c.idservicio = s.idservicio";
$result = mysqli_query($conexion, $query);

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Servicios Agendados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Header -->
    <?php include('administradorHeader.php'); ?>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Servicios Agendados</h2>

        <!-- Tabla de Citas Agendadas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Cita</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Fecha Cita</th>
                    <th>Hora Cita</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['idcita']; ?></td>
                    <td><?php echo $row['nombre_usuario']; ?></td>
                    <td><?php echo $row['nombre_servicio']; ?></td>
                    <td><?php echo $row['fecha_cita']; ?></td>
                    <td><?php echo $row['hora_cita']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detalleModal" onclick='fillDetalleModal(<?php echo json_encode($row); ?>)'>Ver Detalle</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para Ver Detalles de la Cita -->
    <div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabel">Detalle de la Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detalle-modal-body">
                    <!-- Los detalles de la cita se llenarán aquí mediante JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para llenar el modal con detalles -->
    <script>
    function fillDetalleModal(data) {
        const detalleModalBody = document.getElementById('detalle-modal-body');
        detalleModalBody.innerHTML = `
            <p><strong>ID Cita:</strong> ${data.idcita}</p>
            <p><strong>Usuario:</strong> ${data.nombre_usuario}</p>
            <p><strong>Servicio:</strong> ${data.nombre_servicio}</p>
            <p><strong>Fecha:</strong> ${data.fecha_cita}</p>
            <p><strong>Hora:</strong> ${data.hora_cita}</p>
            <p><strong>Descripción:</strong> ${data.descripcion}</p>
            <p><strong>Estado:</strong> ${data.estado}</p>
        `;
    }
    </script>

</body>
</html>

<?php
// Conexión a la base de datos
include('../../backend/config/Database.php');
$db = new Database();
$conexion = $db->getConexion(); // Obtener conexión usando el método del master

// Leer las citas agendadas utilizando consultas preparadas
$query = "
    SELECT c.idcita, c.idusuario, c.idservicio, c.fecha_cita, c.hora_cita, c.descripcion, c.estado, 
           u.nombre AS nombre_usuario, s.nombre_servicio
    FROM citas c
    JOIN usuarios u ON c.idusuario = u.idusuario
    JOIN servicios s ON c.idservicio = s.idservicio
";
$stmt = $conexion->prepare($query); // Preparar la consulta
$stmt->execute(); // Ejecutar la consulta
$result = $stmt->get_result(); // Obtener los resultados
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Servicios Agendados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>
<body class="min-h-screen flex bg-gray-100">

    <!-- Barra lateral -->
    <?php include 'dashboard_sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 md:ml-64">
        <div class="container mx-auto mt-5">
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de administrar de Servicios Agendados</h1>
        </div>
            <table class="table-auto w-full text-left bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Tabla de contenido -->
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6">ID Cita</th>
                        <th class="py-3 px-6">Usuario</th>
                        <th class="py-3 px-6">Servicio</th>
                        <th class="py-3 px-6">Fecha Cita</th>
                        <th class="py-3 px-6">Hora Cita</th>
                        <th class="py-3 px-6">Estado</th>
                        <th class="py-3 px-4 w-48 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6"><?php echo $row['idcita']; ?></td>
                        <td class="py-3 px-6"><?php echo $row['nombre_usuario']; ?></td>
                        <td class="py-3 px-6"><?php echo $row['nombre_servicio']; ?></td>
                        <td class="py-3 px-6"><?php echo $row['fecha_cita']; ?></td>
                        <td class="py-3 px-6"><?php echo $row['hora_cita']; ?></td>
                        <td class="py-3 px-6"><?php echo $row['estado']; ?></td>
                        <td class="py-3 px-4 w-48 flex space-x-1 justify-center">
                            <!-- Botón para ver detalles -->
                            <button type="button" class="bg-blue-500 text-white px-2 py-1 rounded text-ms hover:bg-blue-700" data-bs-toggle="modal" data-bs-target="#detalleModal" onclick='fillDetalleModal(<?php echo json_encode($row); ?>)'>Detalle</button>

                            <!-- Botón para cambiar estado -->
                            <button type="button" class="bg-yellow-500 text-white px-2 py-1 rounded text-ms hover:bg-yellow-700" onclick="cambiarEstado(<?php echo $row['idcita']; ?>, '<?php echo $row['estado']; ?>')">Estado</button>

                            <!-- Formulario para eliminar cita -->
                            <form action="../../backend/CRUDcitas/eliminar_cita.php" method="POST" style="display: inline;">
                                <input type="hidden" name="idcita" value="<?php echo $row['idcita']; ?>">
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-ms hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>


    <!-- Scripts de JavaScript -->
    <script>
        // Función para cambiar el estado de una cita
        function cambiarEstado(id, estado) {
            let nuevoEstado = estado === 'pendiente' ? 'cerrado' : 'pendiente';
            window.location.href = "../../backend/CRUDcitas/cambiar_estado.php?idcita=" + id + "&estado=" + nuevoEstado;
        }

        // Función para eliminar una cita
        function eliminarCita(id) {
            if (confirm("¿Estás seguro de eliminar esta cita?")) {
                window.location.href = "../../backend/CRUDcitas/eliminar_cita.php?idcita=" + id;
            }
        }
    </script>

</body>


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
                    <button type="button" class="bg-gray-500 text-white px-3 py-1 rounded text-sm hover:bg-gray-700" data-bs-dismiss="modal">Cerrar</button>
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

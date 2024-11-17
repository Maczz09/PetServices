<?php
include '../../backend/config/admin_session.php';
include '../../backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

// Consultar todos los servicios
$query = "SELECT * FROM servicios";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Servicios</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 md:ml-64">
        <div class="container mx-auto mt-5">
            <h2 class="text-2xl font-semibold text-center mb-4">Administración de Servicios</h2>
            <button class="bg-green-500 text-white px-4 py-2 rounded mb-4" onclick="openAddServiceModal()">Agregar Servicio</button>

            <!-- Tabla de Servicios -->
            <table class="table-auto w-full text-left bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6">ID Servicio</th>
                        <th class="py-3 px-6">Nombre</th>
                        <th class="py-3 px-6">Descripción</th>
                        <th class="py-3 px-6">Precio</th>
                        <th class="py-3 px-6">Categoría</th>
                        <th class="py-3 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6"><?php echo $row['idservicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['nombre_servicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['descripcion_servicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['precio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['categoria']; ?></td>
                            <td class="py-3 px-6 flex space-x-2">
                                <!-- Botón para abrir el modal de editar servicio -->
                                <button type="button" onclick="openEditServiceModal(<?php echo htmlspecialchars(json_encode($row)); ?>)" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Editar</button>

                                <!-- Botón para eliminar servicio -->
                                <form action="../../backend/CRUDservicios/eliminar_servicio.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="idservicio" value="<?php echo $row['idservicio']; ?>">
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Eliminar</button>
                                </form>

                                <!-- Modal de error específico para este servicio -->
                                <div id="errorModal-<?php echo $row['idservicio']; ?>" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
                                    <div class="modal-content bg-white p-6 rounded shadow-lg">
                                        <h2 class="text-lg font-bold">No se puede eliminar el servicio</h2>
                                        <p>Este servicio tiene citas asociadas. Elimine las citas antes de intentar eliminar el servicio.</p>
                                        <button onclick="closeModal(<?php echo $row['idservicio']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Agregar Servicio Modal -->
    <div id="addServiceModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Agregar Nuevo Servicio</h2>
            <form action="../../backend/CRUDservicios/agregar_servicio.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre del Servicio</label>
                    <input type="text" id="nombre_servicio" name="nombre_servicio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion_servicio" name="descripcion_servicio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" step="0.01" id="precio" name="precio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <input type="text" id="categoria" name="categoria" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="imagen_servicio" class="block text-sm font-medium text-gray-700">Imagen del Servicio</label>
                    <input type="file" id="imagen_servicio" name="imagen_servicio" accept="image/*" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Servicio</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeAddServiceModal()">Cancelar</button>
            </form>
        </div>
    </div>

    <div id="editServiceModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">Editar Servicio</h2>
        <form id="editServiceForm" action="../../backend/CRUDservicios/editar_servicio.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="edit_idservicio" name="idservicio">
            <div class="mb-4">
                <label for="edit_nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre del Servicio</label>
                <input type="text" id="edit_nombre_servicio" name="nombre_servicio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="edit_descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="edit_descripcion_servicio" name="descripcion_servicio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"></textarea>
            </div>
            <div class="mb-4">
                <label for="edit_precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" step="0.01" id="edit_precio" name="precio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="edit_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <input type="text" id="edit_categoria" name="categoria" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="edit_imagen_servicio" class="block text-sm font-medium text-gray-700">Imagen del Servicio</label>
                <input type="file" id="edit_imagen_servicio" name="imagen_servicio" accept="image/*" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeEditServiceModal()">Cancelar</button>
        </form>
    </div>
</div>



    <script>
        // Mostrar modal específico de error
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const errorId = urlParams.get('idservicio');
            if (urlParams.get('error') === 'citas_asociadas' && errorId) {
                const modal = document.getElementById(`errorModal-${errorId}`);
                if (modal) {
                    modal.classList.remove('hidden');
                }
            }
        };

        // Cerrar modal dinámicamente
        function closeModal(idservicio) {
            const modal = document.getElementById(`errorModal-${idservicio}`);
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        // Abrir y cerrar otros modales
        function openAddServiceModal() {
            document.getElementById('addServiceModal').classList.remove('hidden');
        }

        function closeAddServiceModal() {
            document.getElementById('addServiceModal').classList.add('hidden');
        }

        function openEditServiceModal(service) {
    // Llenar los campos del modal con los datos del servicio
    document.getElementById('edit_idservicio').value = service.idservicio;
    document.getElementById('edit_nombre_servicio').value = service.nombre_servicio;
    document.getElementById('edit_descripcion_servicio').value = service.descripcion_servicio;
    document.getElementById('edit_precio').value = service.precio;
    document.getElementById('edit_categoria').value = service.categoria;

    // Si deseas incluir la imagen en la edición, podrías mostrarla como referencia
    // document.getElementById('edit_imagen_preview').src = 'ruta/del/archivo/' + service.imagen_servicio;

    // Mostrar el modal
    document.getElementById('editServiceModal').classList.remove('hidden');
}

    </script>
</body>

</html>
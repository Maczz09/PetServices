<?php
include '../../backend/config/admin_session.php';
include '../../backend/config/Database.php';

$db = new Database(); // Instancia de la clase Database
$conn = $db->getConexion(); // Conexión con el método del master

// Consultar todos los servicios
$query = "SELECT * FROM servicios";
$stmt = $conn->prepare($query); // Preparar la consulta
$stmt->execute(); // Ejecutar la consulta
$result = $stmt->get_result(); // Obtener los resultados
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración de Servicios</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../images/perro.png">
</head>


<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- Sidebar -->
    <?php include 'dashboard_sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 md:ml-64">
        <div class="container mx-auto mt-5">
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de administrar Servicios</h1>
        </div>
            <button class="bg-green-500 text-white px-4 py-2 rounded mb-4" onclick="openAddServiceModal()">Agregar Servicio</button>

            <!-- Tabla de Servicios -->
            <table class="table-auto w-full text-left bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <th class="py-3 px-6">ID</th>
                        <th class="py-3 px-6">Nombre</th>
                        <th class="py-3 px-6">Descripción</th>
                        <th class="py-3 px-6">Precio</th>
                        <th class="py-3 px-6">Categoría</th>
                        <th class="py-3 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100" id="serviceRow-<?php echo $row['idservicio']; ?>">
                            <td class="py-3 px-6"><?php echo $row['idservicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['nombre_servicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['descripcion_servicio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['precio']; ?></td>
                            <td class="py-3 px-6"><?php echo $row['categoria']; ?></td>
                            <td class="py-3 px-6 flex space-x-2">
                                <!-- Botón para abrir el modal de editar servicio -->
                                <button type="button" onclick="openEditServiceModal(<?php echo htmlspecialchars(json_encode($row)); ?>)" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Editar</button>

                                <!-- Botón para eliminar servicio -->
                                <button type="button" onclick="showToast(<?php echo $row['idservicio']; ?>)" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Eliminar</button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Toast de Confirmación de Eliminación -->
    <div id="toast" class="hidden fixed bottom-5 right-5 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg">
        <p id="toastMessage" class="text-sm">¿Estás seguro de que deseas eliminar este servicio?</p>
        <div class="mt-2 flex space-x-2 justify-end">
            <button onclick="cancelDelete()" class="bg-gray-600 text-white px-4 py-2 rounded">Cancelar</button>
            <button id="toastDeleteBtn" onclick="confirmDelete()" class="bg-red-700 text-white px-4 py-2 rounded">Eliminar</button>
        </div>
    </div>


            <!-- Agregar Servicio Modal -->
            <div id="addServiceModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                    <h2 class="text-xl font-semibold mb-4">Agregar Nuevo Servicio</h2>
                    <form action="../../backend/CRUDservicios/agregar_servicio.php" method="POST" enctype="multipart/form-data">
                        <!-- Campos del formulario -->
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


</body>
<script src="../js/AdminServicios.js"></script>

</html>
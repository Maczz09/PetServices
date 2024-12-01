<?php 
include '../../backend/config/admin_session.php';
include '../../backend/CRUDusers/mostrar_usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrador PetServices</title>
    <link rel="shortcut icon" href="../images/perro.png">

</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- sidenav -->
    <?php include 'dashboard_sidebar.php'; ?>


    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-6">
        <!-- Navbar -->
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de administrar Usuarios</h1>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <p class="text-gray-700 text-justify">
        Bienvenido a la sección de administración de usuarios de Pet Services. Aquí puedes gestionar los usuarios del sistema, 
        incluyendo la posibilidad de agregar nuevos usuarios, editar información existente y eliminar usuarios que ya no sean necesarios.
        Esta plataforma te permitirá mantener un control eficiente sobre los roles asignados y el estado de verificación de los correos electrónicos 
        de los usuarios registrados. Utiliza las herramientas proporcionadas a continuación para mantener la base de datos actualizada y 
        organizada de manera adecuada.
    </p>
</div>
        <!-- Content -->
        <!-- Botón para abrir el modal de Agregar Usuario -->
        <button class="bg-green-500 text-white px-4 py-2 rounded m-4" onclick="openAddUserModal()">Agregar
            Usuario</button>
            <a href="/PetServices/src/backend/CRUDusers/exportar_usuarios_excel.php"class="bg-green-500 text-white px-4 py-2 rounded m-4">Exportar a Excel</a>
            <a href="/PetServices/src/backend/CRUDusers/exportar_usuarios_pdf.php " class="bg-blue-500 text-white px-4 py-2 rounded m-4">Exportar a PDF</a>

        </div>
        <!-- Tabla de Usuarios -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellido</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Dirección</th>
                        <th class="px-4 py-2">Email Verificado</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr class="text-gray-700">
                        <td class="border px-4 py-2"><?php echo $usuario['idusuario']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['nombre']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['apellido']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['email']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['num_telefono']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['direccion']; ?></td>
                        <td class="border px-4 py-2"><?php echo $usuario['email_verificado'] ? 'Sí' : 'No'; ?></td>
                        <td class="border px-4 py-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded"
                                onclick="openEditModal(<?php echo $usuario['idusuario']; ?>)">Editar</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded"
                                onclick="openDeleteModal(<?php echo $usuario['idusuario']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <!-- Modal Editar Usuario -->
        <div id="editModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <form action="../../backend/CRUDusers/editar_usuario.php" method="POST">
                    <input type="hidden" id="editId" name="idusuario">

                    <!-- Los campos con la información del usuario -->
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="editNombre" name="nombre" class="border p-2 w-full mb-2">

                    <label for="apellido">Apellido:</label>
                    <input type="text" id="editApellido" name="apellido" class="border p-2 w-full mb-2">

                    <label for="email">Email:</label>
                    <input type="email" id="editEmail" name="email" class="border p-2 w-full mb-2">

                    <label for="num_telefono">Número de Teléfono:</label>
                    <input type="text" id="editTelefono" name="num_telefono" class="border p-2 w-full mb-2">

                    <label for="direccion">Dirección:</label>
                    <input type="text" id="editDireccion" name="direccion" class="border p-2 w-full mb-2">

                    <!-- El campo para seleccionar el rol del usuario -->
                    <label for="idrol">Rol:</label>
                    <select id="editRol" name="idrol" class="border p-2 w-full mb-2">
                        <option value="1">AdminVet</option>
                        <option value="2">Usuario</option>
                    </select>

                    <!-- Campo de la contraseña (solo si se quiere cambiar) -->
                    <label for="password">Contraseña:</label>
                    <div class="relative">
                        <input type="password" id="editPassword" name="password" class="border p-2 w-full mb-2">
                        <button type="button" class="absolute inset-y-0 right-0 px-3 text-gray-500"
                            onclick="togglePassword()">👁️</button>
                    </div>


                    <!-- Campo para verificar si el email está verificado -->
                    <label for="email_verificado">Email Verificado:</label>
                    <select id="editEmailVerificado" name="email_verificado" class="border p-2 w-full mb-2">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                        onclick="closeEditModal()">Cancelar</button>
                </form>
            </div>
        </div>

<!-- Modal Agregar Usuario -->
<div id="addUserModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="../../backend/CRUDusers/agregar_usuario.php" method="POST">
            <h2 class="text-xl font-semibold mb-4">Agregar Nuevo Usuario</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="border p-2 w-full mb-2" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="border p-2 w-full mb-2" required>

            <label for="email">Email:</label>
            <input type="email" name="email" class="border p-2 w-full mb-2" required>

            <label for="num_telefono">Número de Teléfono:</label>
            <input type="text" name="num_telefono" class="border p-2 w-full mb-2">

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="border p-2 w-full mb-2">

            <label for="password">Contraseña:</label>
            <div class="relative">
                <input type="password" id="addPassword" name="password" class="border p-2 w-full mb-2" required>
                <button type="button" class="absolute inset-y-0 right-0 px-3 text-gray-500" onclick="toggleAddPassword()">👁️</button>
            </div>

            <label for="idrol">Rol:</label>
            <select name="idrol" class="border p-2 w-full mb-2">
                <option value="1">AdminVet</option>
                <option value="2">Usuario</option>
            </select>

            <label for="email_verificado">Email Verificado:</label>
            <select name="email_verificado" class="border p-2 w-full mb-2">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Usuario</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeAddUserModal()">Cancelar</button>
        </form>
    </div>
</div>


        <!-- Modal Eliminar Usuario -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 z-40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                <form action="../../backend/CRUDusers/eliminar_usuario.php" method="POST">
                    <input type="hidden" id="deleteId" name="idusuario">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                        onclick="closeDeleteModal()">Cancelar</button>
                </form>
            </div>
        </div>
        <!-- End Content -->
    </main>


    <script src="http://localhost/petservices/src/fronted/js/CRUDUsers.js"></script>
</body>

</html>
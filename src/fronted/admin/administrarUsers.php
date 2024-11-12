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
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrador PetServices</title>
    <link rel="shortcut icon" href="../images/perro.png">

</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- sidenav -->
    <div
        class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 transition-transform transform -translate-x-full md:translate-x-0 bg-gray-300">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <h2 class="font-bold text-2xl">Pet <span class="bg-[#f84525] text-white px-2 rounded-md">Services</span>
            </h2>
        </a>
        <ul class="mt-4 space-y-2">
            <!-- Menu Items -->
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    <span class="text-sm ml-1">Home</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md sidebar-dropdown-toggle"
                    onclick="toggleDropdown(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="text-sm">Usuarios</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <ul class="pl-7 mt-2 hidden dropdown-content">
                    <li class="mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a href="/PetServices/src/fronted/admin/administrarUsers.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Todos</a>
                    </li>
                    <li class="mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a href="/PetServices/src/fronted/admin/verRoles.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Roles</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                    <span class="text-sm ml-1">Productos</span>
                </a>
            </li>
            <li>
                <a href="administrarVeterinarios.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"stroke-width="1.5"
                    stroke="currentColor" class="size-6"><path d="M142.4 21.9c5.6 16.8-3.5 34.9-20.2 40.5L96 71.1 96 192c0 53 43 96 96 96s96-43 96-96l0-120.9-26.1-8.7c-16.8-5.6-25.8-23.7-20.2-40.5s23.7-25.8 40.5-20.2l26.1 8.7C334.4 19.1 352 43.5 352 71.1L352 192c0 77.2-54.6 141.6-127.3 156.7C231 404.6 278.4 448 336 448c61.9 0 112-50.1 112-112l0-70.7c-28.3-12.3-48-40.5-48-73.3c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3l0 70.7c0 97.2-78.8 176-176 176c-92.9 0-168.9-71.9-175.5-163.1C87.2 334.2 32 269.6 32 192L32 71.1c0-27.5 17.6-52 43.8-60.7l26.1-8.7c16.8-5.6 34.9 3.5 40.5 20.2zM480 224a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>

                    <span class="text-sm ml-1">Veterinarios</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                    </svg>
                    <span class="text-sm ml-1">Servicios</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" stroke-width="1.5"
                    stroke="currentColor" class="size-6"><path d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8l0 464c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488L0 24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 144zM80 352c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 336c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 240z"/></svg>
                    <span class="text-sm ml-1">Reservaciones</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="text-sm ml-1">Noticias</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <span class="text-sm ml-1">comentarios</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                    </svg>
                    <span class="text-sm ml-1">Lugares PetFriendly</span>
                </a>
            </li>
            <li>
                <a href="/PetServices/src/backend/login_register_reset/logout.php"
                    class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>

                    <span>Cerrar Sesión</span>
                </a>

            </li>
        </ul>
    </div>
    <!-- end sidenav -->

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay hidden"
        onclick="hideSidebar()"></div>

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

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/dashboard.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/CRUDUsers.js"></script>
</body>

</html>
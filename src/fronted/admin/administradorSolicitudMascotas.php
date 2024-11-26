<?php 
include '../../backend/config/admin_session.php';
include '../../backend/CRUDmascotas/mostrar_mascotas.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administración de Mascotas</title>
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
                        <a href="/PetServices/src/fronted/admin/administrarUsers.php"
                            class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Todos</a>
                    </li>
                    <li class="mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a href="/PetServices/src/fronted/admin/verRoles.php"
                            class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Roles</a>
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
            <a href="#" class="flex items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md sidebar-dropdown-toggle" onclick="toggleDropdown(event)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                <span class="text-sm ml-1">Adopción</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <ul class="pl-7 mt-2 hidden dropdown-content">
                <li class="mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <a href="/PetServices/src/fronted/admin/administradorMascotas.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Subir Mascotas</a>
                </li>
                <li class="mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <a href="/PetServices/src/fronted/admin/solicitudes_adopcion.php" class="text-gray-900 text-sm flex items-center hover:text-[#f84525]">Solicitudes de Adopción</a>
                </li>
            </ul>
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
            <!-- Additional Items -->
        </ul>
    </div>
    <!-- end sidenav -->

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay hidden" onclick="hideSidebar()"></div>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-6">
        <!-- Navbar -->
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de Subir Mascotas</h1>
        </div>

        <!-- Descripción de la sección -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <p class="text-gray-700 text-justify">
                Bienvenido a la sección de administración de mascotas de Pet Services. Aquí puedes gestionar las mascotas del sistema,
                incluyendo la posibilidad de agregar nuevas mascotas, editar información existente y eliminar mascotas que ya no sean necesarias.
                Utiliza las herramientas proporcionadas a continuación para mantener la base de datos actualizada y organizada de manera adecuada.
            </p>
        </div>

        <!-- Tabla de Personas que solicitaron -->
        <section class="w-3/4 ml-6">
    <h2 class="text-2xl font-bold mb-6">Solicitudes de Adopción</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 solicitudes-list">
        <?php
        include_once '../../backend/config/Database.php';

        $database = new Database();
        $conexion = $database->getConexion();

        $sql = "SELECT 
                    solicitudes_adopcion.id AS solicitud_id,
                    solicitudes_adopcion.estado_solicitud,
                    usuarios.nombre AS usuario_nombre,
                    usuarios.apellido AS usuario_apellido,
                    mascotas.nombre AS mascota_nombre,
                    mascotas.foto AS mascota_foto,
                    mascotas.tipo_mascota
                FROM 
                    solicitudes_adopcion
                JOIN usuarios ON solicitudes_adopcion.idusuario = usuarios.idusuario
                JOIN mascotas ON solicitudes_adopcion.id_mascota = mascotas.id";

        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($solicitud = $result->fetch_assoc()) {
                echo '<a href="#" class="group relative block bg-black">';
                echo '<img
                alt="Foto de ' . htmlspecialchars($solicitud['mascota_nombre']) . '"
                src="/PetServices/src/fronted/adopcion_html/' . htmlspecialchars($solicitud['mascota_foto']) . '"
                class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
                />';

                echo '<div class="relative p-4 sm:p-6 lg:p-8">';
                echo '<p class="text-sm font-medium uppercase tracking-widest text-pink-500">' . htmlspecialchars($solicitud['tipo_mascota']) . '</p>';
                echo '<p class="text-xl font-bold text-white sm:text-2xl">' . htmlspecialchars($solicitud['mascota_nombre']) . '</p>';
                echo '<p class="text-sm text-white mt-2">Por: ' . htmlspecialchars($solicitud['usuario_nombre'] . ' ' . $solicitud['usuario_apellido']) . '</p>';
                echo '<div class="mt-32 sm:mt-48 lg:mt-64">';
                echo '<div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">';
                echo '<p class="text-sm text-white">Estado: ' . htmlspecialchars($solicitud['estado_solicitud']) . '<br>';
                echo '</p>';
                echo '</div>';
                echo '</div>';

                // Botón que abre el modal
                echo '<button 
                        type="button" 
                        class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600 open-modal-btn" 
                        data-id="' . $solicitud['solicitud_id'] . '">
                        Ver Detalles
                      </button>';

                echo '</div>';
                echo '</a>';
            }
        } else {
            echo '<p>No hay solicitudes de adopción en este momento.</p>';
        }

        $conexion->close();
        ?>
    </div>
</section>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <!-- Título del modal -->
        <h2 class="text-lg font-bold text-gray-800 mb-4">Detalles de la Solicitud</h2>

        <!-- Contenido del modal -->
        <div id="modal-content" class="space-y-4">
            <!-- Aquí se inyectarán los detalles de la solicitud -->
        </div>

        <!-- Botones de acción -->
        <div class="mt-4 flex gap-4">
            <button id="aprobar-solicitud" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Aprobar</button>
            <button id="denegar-solicitud" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Denegar</button>
        </div>

        <!-- Botón para cerrar -->
        <button id="close-modal" class="mt-4 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 w-full">
            Cerrar
        </button>
    </div>
</div>



    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/dashboard.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/CRUDSolicitudMascotas.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/CRUDMascotas.js"></script>
</body>

</html>
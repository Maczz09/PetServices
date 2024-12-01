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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administración de Mascotas</title>
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
                echo '<a href="/PetServices/src/fronted/admin/administradorSolicitudMascotas.php" class="group relative block bg-black">';
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
<div id="modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
  <div class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-6 overflow-y-auto max-h-[90vh]">
    <div class="flex justify-between items-center border-b pb-4">
      <h2 class="text-2xl font-semibold text-gray-800">Detalles de la Solicitud</h2>
      <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div id="modal-content" class="mt-4 text-gray-700 space-y-2">
      <!-- Detalles de la solicitud se llenarán dinámicamente aquí -->
    </div>
    <div class="flex justify-end space-x-4 mt-6">
      <button id="approve-btn" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        Aprobar
      </button>
      <button id="reject-btn" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
        Rechazar
      </button>
    </div>
  </div>
</div>




    <script src="http://localhost/petservices/src/fronted/js/CRUDSolicitudMascotas.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/CRUDMascotas.js"></script>
</body>

</html>
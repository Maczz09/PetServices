<?php 
include '../../backend/config/admin_session.php'; 
include '../../backend/CRUDvet/mostrar_especialidad.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Especialidades</title>
    <link rel="shortcut icon" href="../images/perro.png">

</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- sidenav -->
    <?php include 'dashboard_sidebar.php'; ?>


        <main class="flex-1 md:ml-64 p-6">
            <!-- Navbar -->
            <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
                <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
                <h1 class="text-xl font-semibold text-gray-800">Sección de Especialidades</h1>
            </div>

            <!-- Descripción de la sección de roles -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-gray-700 text-justify">
                    Esta es la sección de especialidades, donde puedes visualizar las distintas categorias disponibles en el sistema. 
                    Cada especialidad define el grupo en el que va a estar el veterinario. Asegúrate de que cada veterinario tenga asignado 
                    un idcategoria adecuado.
                </p>
            </div>

            <!-- Tabla de Especialidades -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2">ID Especialidad</th>
                            <th class="px-4 py-2">Especialidad</th>
                            <th class="px-4 py-2">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($especialidades as $especialidad): ?>
                            <tr class="text-gray-700">
                                <td class="border px-4 py-2"><?php echo $especialidad['idcategoriaespecialidad']; ?></td>
                                <td class="border px-4 py-2"><?php echo $especialidad['nombre_especialidad']; ?></td>
                                <td class="border px-4 py-2"><?php echo $especialidad['descripcion']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- End Content -->
        </main>
</body>

</html>
<?php 
include '../../backend/config/admin_session.php'; 
include '../../backend/CRUDusers/mostrar_roles.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Roles</title>

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
            <h1 class="text-xl font-semibold text-gray-800">Sección Roles</h1>
        </div>

        <!-- Descripción de la sección de roles -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <p class="text-gray-700 text-justify">
                Esta es la sección de Roles, donde puedes visualizar los distintos roles disponibles en el sistema. Cada rol define 
                el nivel de acceso y las responsabilidades de los usuarios dentro de Pet Services. Aquí puedes ver una lista de todos 
                los roles y su respectiva descripción. Asegúrate de que cada usuario tenga asignado el rol adecuado de acuerdo a sus 
                responsabilidades en el sistema.
            </p>
        </div>

        <!-- Tabla de Roles -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2">ID Rol</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $rol): ?>
                    <tr class="text-gray-700">
                        <td class="border px-4 py-2"><?php echo $rol['idrol']; ?></td>
                        <td class="border px-4 py-2"><?php echo $rol['nombre']; ?></td>
                        <td class="border px-4 py-2"><?php echo $rol['descripcion']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Content -->
    </main>

</body>

</html>
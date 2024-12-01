<?php
include '../../backend/config/admin_session.php';
?>
<!DOCTYPE html>
<html lang="en">

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
            <h1 class="text-xl font-semibold text-gray-800">Bienvenido a la dashboard!</h1>
        </div>
        <!-- Content -->
        <div class="grid grid-cols-6 grid-rows-4 gap-4">
            <!-- Adapted Layout -->
            <div
                class="col-span-4 row-span-4 col-start-2 row-start-1 bg-white rounded-lg shadow-md p-2 flex items-center justify-center">
                <img src="../images/admin/panel_dashboard.jpg" alt="panel" class="w-full h-full object-cover rounded">
            </div>
            <div
                class="row-span-4 col-start-6 row-start-1 bg-white rounded-lg shadow-md p-2 flex items-center justify-center">
                <img src="../images/admin/gatito.jpg" alt="panel" class="w-full h-full object-cover rounded">
            </div>
            <div
                class="row-span-4 col-start-1 row-start-1 bg-white rounded-lg shadow-md p-2 flex items-center justify-center">
                <img src="../images/admin/perrito.jpg" alt="panel" class="w-full h-full object-cover rounded">
            </div>
        </div>
        <!-- End Content -->
    </main>

</body>

</html>
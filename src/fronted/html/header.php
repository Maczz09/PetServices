<?php 
include '../../backend/config/session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetServices</title>
    <link rel="shortcut icon" href="../images/perro.png">
    <!-- Tailwind CSS Link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <script src="../js/menuInferior.js"></script>
    <style>
        /* Fondo del body con una imagen */
        body {
            background-image: url('../images/background.webp');
            background-size: cover; 
            background-attachment: fixed; 
            background-position: center;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="bg-blue-400 fixed w-full z-10 top-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="text-white text-3xl font-semibold">
                    <img src="../images/Logo.png" alt="Logo" class="h-12 w-auto" />
                </a>
            </div>

            <!-- Navegación principal -->
            <div class="hidden md:flex space-x-6">
                <a href="../html/index.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/directorio.png" alt="Directorio" class="h-6 w-6 mr-2" />
                    Directorio
                </a>
                <a href="../places_petfriendly/menu_places.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/lugar.png" alt="Lugares PetFriendly" class="h-6 w-6 mr-2" />
                    Lugares PetFriendly
                </a>
                <a href="../html/petshop.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
                    Tienda
                </a>
                <a href="#" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/servicios.png" alt="Servicios" class="h-6 w-6 mr-2" />
                    Servicios
                </a>
                <a href="../html/nosotros.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/nosotros.png" alt="Nosotros" class="h-6 w-6 mr-2" />
                    Nosotros
                </a>
            </div>

            <!-- Botón de perfil / Iniciar sesión / Registro -->
            <div class="flex items-center">
                <div class="relative">
                    <?php if ($isLoggedIn): ?>
                    <!-- Si el usuario está conectado -->
                    <button id="profileBtn" class="bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700">
                        <i class="fas fa-user"></i>
                    </button>
                    <div id="profileDiv" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Tu perfil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Configuración</a>
                        <a href="../../backend/login_register_reset/logout.php" class="block px-4 py-2 text-sm text-gray-700">Cerrar Sesión</a>
                    </div>
                    <?php else: ?>
                    <!-- Si el usuario no está conectado -->
                    <a href="../authentication/login.php" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                    <a href="../authentication/register_usuario.php" class="ml-4 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                        <i class="fas fa-user-plus"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

<!-- Barra de navegación inferior estilo iPhone -->
<nav class="fixed inset-x-0 bottom-0 bg-white border-t border-gray-300 shadow-lg z-50 md:hidden">
    <div class="flex justify-around items-center h-16">
        <a id="nav-home" href="../html/index.php" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-home text-2xl"></i>
            <span class="text-xs mt-1">Home</span>
        </a>
        <a id="nav-petfriendly" href="../places_petfriendly/menu_places.php" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-paw text-2xl"></i>
            <span class="text-xs mt-1">PetFriendly</span>
        </a>
        <a id="nav-petshop" href="../html/petshop.php" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-store text-2xl"></i>
            <span class="text-xs mt-1">Tienda</span>
        </a>
        <a id="nav-services" href="#" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-cog text-2xl"></i>
            <span class="text-xs mt-1">Servicios</span>
        </a>
        <a id="nav-nosotros" href="../html/nosotros.php" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-users text-2xl"></i>
            <span class="text-xs mt-1">Nosotros</span>
        </a>
    </div>
</nav>
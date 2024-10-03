<?php 
include '../../backend/config/session.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tailwind CSS Link -->
    <link href="../../output.css" rel="stylesheet">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
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
                <a href="index.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/directorio.png" alt="Directorio" class="h-6 w-6 mr-2" />
                    Directorio
                </a>
                <a href="lugares_petfriendly.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/lugar.png" alt="Lugares PetFriendly" class="h-6 w-6 mr-2" />
                    Lugares PetFriendly
                </a>
                <a href="petshop.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
                    Tienda
                </a>
                <a href="#" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="../images/servicios.png" alt="Servicios" class="h-6 w-6 mr-2" />
                    Servicios
                </a>
                <a href="nosotros.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
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
    <!-- Elimina el atributo 'action' y usa 'href' correctamente -->
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

            <!-- Botón para dispositivos móviles -->
            <div class="md:hidden">
                <button id="menuBtn" class="text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>
    <!-- Menú desplegable para móviles -->
    <div id="mobileMenu" class="hidden md:hidden bg-blue-400">
        <a href="index.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/directorio.png" alt="Directorio" class="h-6 w-6 mr-2" />
            Directorio
        </a>
        <a href="lugares_petfriendly.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/lugar.png" alt="Lugares PetFriendly" class="h-6 w-6 mr-2" />
            Lugares PetFriendly
        </a>
        <a href="#" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
            Tienda
        </a>
        <a href="#" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/servicios.png" alt="Servicios" class="h-6 w-6 mr-2" />
            Servicios
        </a>
        <a href="#" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/nosotros.png" alt="Nosotros" class="h-6 w-6 mr-2" />
            Nosotros
        </a>
    </div>

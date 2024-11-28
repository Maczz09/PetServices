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
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="bg-[#2c9dae] fixed w-full z-10 top-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="text-white text-3xl font-semibold">
                    <img src="../images/Logo.png" alt="Logo" class="h-12 w-auto" />
                </a>
            </div>

            <!-- Navegación principal -->
            <div class="hidden md:flex space-x-6 ">
                <a href="http://localhost/petservices/src/fronted/html/index.php"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 after:transition-all after:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#278093] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-[#132f39]">
                    Home
                </a>
                <a href="http://localhost/petservices/src/fronted/places_petfriendly/menu_places.php"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 after:transition-all after:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#278093] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-[#132f39]">
                    Lugares PetFriendly
                </a>
                <a href="http://localhost/petservices/src/fronted/Tienda/petshop.php"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 after:transition-all after:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#278093] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-[#132f39]">
                    Tienda
                </a>
                <a href="../Servicios/servicios.php"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 after:transition-all after:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#278093] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-[#132f39]">
                    Servicios
                </a>
                <a href="http://localhost/petservices/src/fronted/html/nosotros.php"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 after:transition-all after:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#278093] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-[#132f39]">
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
                        <a href="compra.php" class="block px-4 py-2 text-sm text-gray-700">Pedidos</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Configuración</a>
                        <a href="../../backend/login_register_reset/logout.php"
                            class="block px-4 py-2 text-sm text-gray-700">Cerrar Sesión</a>
                    </div>
                    <?php else: ?>
                    <!-- Si el usuario no está conectado -->
                    <a href="../authentication/login.php"
                        class="ml-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                    <a href="../authentication/register_usuario.php"
                        class="ml-4 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                        <i class="fas fa-user-plus"></i>
                    </a>
                    <?php endif; ?>
                </div>
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
        <a href="http://localhost/petservices/src/fronted/Tienda/petshop.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
            Tienda
        </a>
        <a href="servicios.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/servicios.png" alt="Servicios" class="h-6 w-6 mr-2" />
            Servicios
        </a>
        <a href="#" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/nosotros.png" alt="Nosotros" class="h-6 w-6 mr-2" />
            Nosotros
        </a>
    </div>


    <!-- Barra de navegación inferior estilo iPhone -->
    <nav class="fixed inset-x-0 bottom-0 bg-[#47bac9] text-white shadow-lg z-50 md:hidden rounded-t-xl">
        <div class="flex justify-around items-center h-16">
            <!-- Home -->
            <a href="http://localhost/petservices/src/fronted/html/index.php"
                class="flex flex-col items-center text-[#132f39] hover:text-white transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                <span class="text-xs font-semibold">Home</span>
            </a>


            <!-- Lugares PetFriendly -->
            <a href="http://localhost/petservices/src/fronted/places_petfriendly/menu_places.php"
                class="flex flex-col items-center text-[#132f39] hover:text-white transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                </svg>

                <span class="text-xs font-semibold">Lugares PetFriendly</span>
            </a>

            <!-- Tienda -->
            <a href="http://localhost/petservices/src/fronted/Tienda/petshop.php"
                class="flex flex-col items-center text-[#132f39] hover:text-white transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                </svg>

                <span class="text-xs font-semibold">Tienda</span>
            </a>

            <!-- Servicios -->
            <a href="#"
                class="flex flex-col items-center text-[#132f39] hover:text-white transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                </svg>
                <span class="text-xs font-semibold">Servicios</span>
            </a>

            <!-- Nosotros -->
            <a href="http://localhost/petservices/src/fronted/html/nosotros.php"
                class="flex flex-col items-center text-[#132f39] hover:text-white transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span class="text-xs font-semibold">Nosotros</span>
            </a>
        </div>
    </nav>
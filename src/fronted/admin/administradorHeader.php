<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
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
                    <img src="images/Logo.png" alt="PetServices" class="h-12 w-auto" />
                </a>
            </div>

            <!-- Navegación principal -->
            <div class="hidden md:flex space-x-6">
                <a href="administradorAdministradores.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="images/programador-back.png" alt="Administradores" class="h-6 w-6 mr-2" />
                    Administradores
                </a>
                <a href="administradorAdministradores.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="images/programador-back.png" alt="Administradores" class="h-6 w-6 mr-2" />
                    Adopcion
                </a>
                <a href="administradorProductos.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="images/productos1.png" alt="Productos" class="h-6 w-6 mr-2" />
                    veterinarios
                </a>
                <a href="administradorProductos.php" class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500">
                    <img src="images/productos1.png" alt="Productos" class="h-6 w-6 mr-2" />
                    Productos
                </a>
            </div>
            

            <!-- Botón de perfil / Iniciar sesión / Cerrar sesión -->
            <div class="flex items-center">
                <a href="login.php" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <i class='bx bxs-user-plus'></i>
                </a>
                <a href="logout.php" class="ml-4 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                    <i class='bx bx-log-out-circle'></i>
                </a>
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
        <a href="administradorAdministradores.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/admin.jpeg" alt="Administradores" class="h-6 w-6 mr-2" />
            Administradores
        </a>
        <a href="administradorProductos.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/productos_icon.png" alt="Productos" class="h-6 w-6 mr-2" />
            Productos
        </a>
        <a href="administradorReservas.php" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
            <img src="images/reservas_icon.png" alt="Reservas" class="h-6 w-6 mr-2" />
            Atender Reservas
        </a>
    </div>
</body>
</html>

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
                <a href="../Tienda/petshop.php"
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

            <!-- Carrito de compras -->
            <div class="relative">
                <button id="carritoBtn" class="text-white relative p-2 bg-[#2c9dae] rounded-full hover:bg-[#278093]">
                    <i class="fas fa-shopping-cart"></i>
                    <!-- Contador de productos en el carrito -->
                    <span id="carritoContador" class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                </button>
                
                <!-- Dropdown del carrito -->
                <div id="carritoDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg z-50">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">Carrito</h3>
                        <div id="carritoProductos" class="space-y-2">
                            <!-- Aquí se mostrarán los productos del carrito -->
                            <p class="text-gray-600">Tu carrito está vacío</p>
                        </div>
                        <button id="realizarCompraBtn" class="w-full mt-4 bg-green-600 text-white rounded-lg py-2 hover:bg-green-700">Realizar Compra</button>
                    </div>
                </div>
            </div>

            <!-- Botón de perfil / Iniciar sesión / Registro -->
            <div class="flex items-center ml-4">
                <div class="relative">
                    <?php if ($isLoggedIn): ?>
                    <!-- Si el usuario está conectado -->
                    <button id="profileBtn" class="bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700">
                        <i class="fas fa-user"></i>
                    </button>
                    <div id="profileDiv" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Tu perfil</a>
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
        <a href="#" class="flex items-center text-white py-2 px-4 hover:bg-blue-700">
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


    <!-- JavaScript para manejar el carrito y realizar la compra -->
    <script>
        // Muestra u oculta el carrito al hacer clic en el botón
        document.getElementById('carritoBtn').addEventListener('click', function () {
            document.getElementById('carritoDropdown').classList.toggle('hidden');
        });

        // Maneja el clic en el botón de "Realizar Compra"
        document.getElementById('realizarCompraBtn').addEventListener('click', function () {
            <?php if ($isLoggedIn): ?>
                window.location.href = 'formularioCompra.php'; // Redirige al formulario de compra si el usuario está logeado
            <?php else: ?>
                window.location.href = '../authentication/login.php?redirect=formularioCompra.php'; // Redirige al login y luego al formulario de compra
            <?php endif; ?>
        });

        // Función para actualizar el contenido del carrito
        function actualizarCarrito() {
        fetch('../Tienda/get_carrito.php')
        .then(response => response.json())
        .then(data => {
            const carritoProductos = document.getElementById('carritoProductos');
            const contadorCarrito = document.getElementById('carritoContador');
            
            // Limpiamos el contenido del carrito
            carritoProductos.innerHTML = '';

            if (data.length > 0) {
                // Si hay productos en el carrito, iteramos sobre ellos para mostrarlos
                data.forEach(producto => {
                    const productoDiv = document.createElement('div');
                    productoDiv.classList.add('flex', 'justify-between', 'items-center', 'border-b', 'pb-2', 'mb-2');

                    productoDiv.innerHTML = `
                        <span class="text-gray-800">${producto.nombre}</span>
                        <span class="text-green-600">S/${producto.precio.toFixed(2)} x ${producto.cantidad}</span>
                    `;
                    
                    carritoProductos.appendChild(productoDiv);
                });
                
                // Actualizamos el contador de productos en el carrito
                const totalItems = data.reduce((sum, item) => sum + item.cantidad, 0);
                contadorCarrito.textContent = totalItems;
            } else {
                // Si no hay productos, mostramos el mensaje de carrito vacío
                carritoProductos.innerHTML = '<p class="text-gray-600">Tu carrito está vacío</p>';
                contadorCarrito.textContent = '0';
            }
        })
        .catch(error => console.error('Error al obtener el carrito:', error));
}
        // Llama a actualizarCarrito cuando se carga la página
        actualizarCarrito();
    </script>
</body>
</html>

<<?php
require ('config/config.php');
require('config/database.php');
$db = new Database();
$con = $db->conectar();



include 'session.php'; 
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body>
    
    <!-- Contenido principal -->
    <main class="mt-20 p-6">
        <section class="bg-slate-200 flex-1">
            <div class="container mx-auto mt-10">
                <!-- Carrusel -->
                <div class="relative w-full overflow-hidden rounded-lg">
                    <div id="carousel" class="carousel-inner flex w-full">
                        <!-- Slide 1 -->
                        <div class="flex-none w-full bg-purple-700 text-white flex items-center justify-center h-80">
                            <div class="text-center">
                                <h1 class="text-3xl font-bold">
                                    Aquí encontrarás una amplia variedad de servicios
                                </h1>
                                <p class="mt-2">
                                    Desde veterinarias hasta pet shops, paseadores, fotografías
                                    y mucho más.
                                </p>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="flex-none w-full bg-yellow-400 text-black flex items-center justify-center h-80">
                            <div class="text-center">
                                <h1 class="text-3xl font-bold">
                                    Somos todo lo que tu mascota necesita
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!-- Controles del carrusel -->
                    <button id="prev"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 px-4 py-2">
                        ‹
                    </button>
                    <button id="next"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 px-4 py-2">
                        ›
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- Sección de categorías -->
    <section id="categorias" class="py-5">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold mb-4">Categorías</h2>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 xl:w-1/4 p-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Accesorios</h3>
                        <img src="images/Accesorios.jpg"  class="h-24 w-24 mr-2" />
                        <p class="text-gray-600 mb-4">Encuentra los mejores accesorios para tu mascota.</p>
                        <a href="accesorios.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ver más</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Alimento</h3>
                        <img src="images/alimento.jpeg"  class="h-24 w-24 mr-2" />
                        <p class="text-gray-600 mb-4">Encuentra el alimento perfecto para tu mascota.</p>
                        <a href="alimento.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ver más</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Higiene</h3>
                        <img src="images/higiene.jpeg"  class="h-24 w-24 mr-2" />
                        <p class="text-gray-600 mb-4">Mantén a tu mascota limpia y saludable.</p>
                        <a href="higiene.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ver más</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-4">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Salud</h3>
                        <img src="images/salud.jpeg"  class="h-24 w-24 mr-2" />
                        <p class="text-gray-600 mb-4">Cuida la salud de tu mascota con nuestros productos.</p>
                        <a href="salud.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="ocultar_mostrar.js"></script>
    <script src="main.js"></script>

</html>


<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tailwind CSS Link -->
    <link href="../../output.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>
<body>
    <!-- BANNER PRINCIPAL -->
  <section>
  <div class="banner mt-16">
    <?php
    // Array con las rutas de las imágenes
    $imagenes = array(
     "../images/bannerprincipalperros.jpg", 
     "../images/bannerperropequeño.jpg", 
     "../images/bannercuyes.jpg"
       );

    // Mostrar las imágenes dentro del banner
     foreach ($imagenes as $imagen) {
     echo "<img src='$imagen' alt='Imagen del banner'>";
     }
    ?>
     </div>
    <script src="../js/bannergirar.js"></script>
    </section>

        <section class="flex-grow  h-screen">
                <!-- Directorio de Servicios -->
                <section class="mt-12">
                    <h2 class="text-center text-3xl font-bold mb-6">
                        Directorio de Servicios para Mascotas en Piura
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Tarjetas -->
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="veterinarias.php">
                                <img src="../images/doctor.png" alt="Veterinarias" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Veterinarias</h3>
                            </a>
                        </div>
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="petshop.php">
                                <img src="../images/Ropa.jpg" alt="Pet Shop" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Pet Shop</h3>
                            </a>
                        </div>
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="../peluqueria.php">
                                <img src="../images/Peluqueria de perros.jpg" alt="Lugares Pet Friendly" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Peluquería</h3>
                            </a>
                        </div>
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="servicios_adicionales.php">
                                <img src="../images/ayuda.png" alt="Servicios Adicionales" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Servicios Adicionales</h3>
                            </a>
                        </div>
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="guarderia.php">
                                <img src="../images/signo-de-hotel-para-mascotas.png" alt="Guardería" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Guardería</h3>
                            </a>
                        </div>
                        <div class="border border-red-500 p-6 rounded-lg text-center">
                            <a href="adopcion.php">
                                <img src="../images/perro y gato.png" alt="Adopción De Mascotas" class="h-20 w-20 mb-1 mx-auto" />
                                <h3 class="text-xl font-bold">Adopción De Mascotas</h3>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Barra de búsqueda -->
                <section class="mt-12">
                    <h2 class="text-center text-2xl font-bold mb-4">
                        Encuentra lo mejor para tu mascota
                    </h2>
                    <div class="flex justify-center gap-4">
                        <input type="text" placeholder="¿Qué estás buscando?" class="border p-2 w-1/3 search-input" />
                        <input type="text" placeholder="Distrito" class="border p-2 w-1/4 district-input" />
                        <select class="border p-2 w-1/4 category-select">
                            <option value="">Buscar por servicios</option>
                            <option value="veterinarias">Veterinarias</option>
                            <option value="petshop">Pet Shop</option>
                        </select>
                        <button class="bg-red-500 text-white p-2 rounded-full search-button">
                            🔍
                        </button>
                    </div>
                </section>
                <!-- Noticias sobre mascotas -->
                <section class="mt-12">
                    <h2 class="text-center text-3xl font-bold mb-6">
                        Noticias sobre Mascotas
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Noticia 1 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/perroygatojuntos.jpg" alt="Noticia sobre mascotas"
                                class=" mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Perros y gatos: los mejores compañeros
                            </h3>
                            <p class="text-gray-600">
                                Un reciente estudio revela que las mascotas pueden mejorar la
                                salud mental de las personas.
                            </p>
                        </article>
                        <!-- Noticia 2 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/Consejos-refrescantes-dias-calurosos.jpg" alt="Noticia sobre mascotas"
                                class="h-40 w-60 mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Cómo cuidar a tu mascota en días calurosos
                            </h3>
                            <p class="text-gray-600">
                                Consejos prácticos para mantener a tu perro fresco y saludable
                                en el verano.
                            </p>
                        </article>
                        <!-- Noticia 3 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/adoptar.jpeg" alt="Noticia sobre mascotas"
                                class="h-40 w-60 mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Adopta, no compres: la importancia de la adopción
                            </h3>
                            <p class="text-gray-600">
                                La adopción de mascotas es un acto de amor que ayuda a salvar
                                vidas y a dar una segunda oportunidad a perros y gatos.
                            </p>
                        </article>
                    </div>
                </section>
                <!-- Historias -->
                <section class="mt-12">
                    <h2 class="text-center text-3xl font-bold mb-6">
                        Historias Felices
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Historia 1 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/gatocallejero.jpeg" alt="Historias Felices"
                                class="h-40 w-60 mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Luna: de la calle a un hogar lleno de amor
                            </h3>
                            <p class="text-gray-600">
                                Luna fue rescatada de las calles y ahora vive feliz con su nueva familia, disfrutando de
                                largos paseos y mucho cariño.
                            </p>
                        </article>
                        <!-- Historia 2 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/perrodecampo.jpeg" alt="Historias Felices"
                                class="h-40 w-60 mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Max y su nueva vida en el campo
                            </h3>

                            <p class="text-gray-600">
                                Max fue adoptado por una familia que vive en el campo. Ahora corre libremente por los
                                prados y juega todos los días.
                            </p>
                        </article>
                        <!-- Historia 3 -->
                        <article class="border border-gray-400 p-6 rounded-lg text-center bg-white">
                            <img src="../images/perroconabuela.jpeg" alt="Historias Felices"
                                class="h-40 w-60 mx-auto mb-4 rounded-lg" />
                            <h3 class="text-xl font-bold mb-2">
                                Coco: el compañero inseparable
                            </h3>
                            <p class="text-gray-600">
                                Coco llegó a su nuevo hogar justo cuando más lo necesitaban. Ahora es el mejor amigo de
                                su dueña, quien lo describe como su compañero inseparable.
                            </p>
                        </article>
                    </div>
                </section>
    </main>
    <!-- Incluir el footer -->
    <?php include 'footer.php'; ?>
    <script src="../js/main.js"></script>
</body>
</html>

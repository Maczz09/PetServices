<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS Link -->
    <link href="../../output.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body class="min-h-screen flex flex-col">
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
    <main class="flex-grow">
        <section class="flex-grow  mb-40">

<!-- Directorio de Servicios -->
<section class="mt-12">
    <h2 class="text-center text-3xl font-bold mb-8">
        Directorio de Servicios para Mascotas en Piura
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto place-items-center">
        <!-- Tarjeta 1: Veterinarios -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/doctor.png" alt="Veterinarios" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Veterinarios</h2>
                    <p class="mt-2 text-sm text-gray-500">Especialistas en cuidado de tu mascota.</p>
                </div>
                <a href="../servicio veterinarios/menuveterinario.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tarjeta 2: Pet Shop -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/pet-shopicon.png" alt="Pet Shop" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Pet Shop</h2>
                    <p class="mt-2 text-sm text-gray-500">Todo lo que tu mascota necesita.</p>
                </div>
                <a href="petshop.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tarjeta 3: Peluquería -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/peluqueriaperros.png" alt="Peluquería" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Peluquería</h2>
                    <p class="mt-2 text-sm text-gray-500">Servicios de estética para tu mascota.</p>
                </div>
                <a href="peluqueria.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tarjeta 4: Servicios Adicionales -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/ayuda.png" alt="Servicios Adicionales" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Servicios Adicionales</h2>
                    <p class="mt-2 text-sm text-gray-500">Servicios complementarios para tu mascota.</p>
                </div>
                <a href="servicios_adicionales.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tarjeta 5: Guardería -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/signo-de-hotel-para-mascotas.png" alt="Guardería" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Guardería</h2>
                    <p class="mt-2 text-sm text-gray-500">Cuidado para tu mascota cuando no estás en casa.</p>
                </div>
                <a href="guarderia.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tarjeta 6: Adopción De Mascotas -->
        <div
            class="bg-white w-[280px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[250px] relative group">
            <div class="m-5">
                <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                    <img src="../images/perro y gato.png" alt="Adopción De Mascotas" />
                </div>
                <div class="mt-4 text-left w-full mb-3">
                    <h2 class="text-2xl roboto-mono-500 text-gray-800">Adopción De Mascotas</h2>
                    <p class="mt-2 text-sm text-gray-500">Encuentra a tu nuevo compañero de vida.</p>
                </div>
                <a href="adopcion.php">
                    <div
                        class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18.256 18.256"
                            style="transition:.3s">
                            <g transform="translate(5.363 5.325)">
                                <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)" fill="none"
                                    stroke="#0D1117" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                            </g>
                            <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                        </svg>
                    </div>
                </a>
            </div>
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
            <!-- Noticias sobre Mascotas -->
            <section class="mt-16">
                <h2 class="text-center text-3xl font-bold mb-8">
                    Noticias sobre Mascotas
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Noticia 1 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/perroygatojuntos.jpg" alt="Perros y gatos"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Perros y gatos: los mejores compañeros</h3>
                        <p class="text-gray-600">Un reciente estudio revela que las mascotas pueden mejorar la salud
                            mental
                            de las personas.</p>
                    </article>
                    <!-- Noticia 2 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/Consejos-refrescantes-dias-calurosos.jpg" alt="Consejos para días calurosos"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Cómo cuidar a tu mascota en días calurosos</h3>
                        <p class="text-gray-600">Consejos prácticos para mantener a tu perro fresco y saludable en el
                            verano.</p>
                    </article>
                    <!-- Noticia 3 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/adoptar.jpeg" alt="Adopción de mascotas"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Adopta, no compres: la importancia de la adopción</h3>
                        <p class="text-gray-600">La adopción de mascotas es un acto de amor que ayuda a salvar vidas y a
                            dar
                            una segunda oportunidad.</p>
                    </article>
                </div>
            </section>

            <!-- Historias Felices -->
            <section class="mt-16">
                <h2 class="text-center text-3xl font-bold mb-8">
                    Historias Felices
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Historia 1 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/gatocallejero.jpeg" alt="Historia de Luna"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Luna: de la calle a un hogar lleno de amor</h3>
                        <p class="text-gray-600">Luna fue rescatada de las calles y ahora vive feliz con su nueva
                            familia,
                            disfrutando de largos paseos.</p>
                    </article>
                    <!-- Historia 2 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/perrodecampo.jpeg" alt="Historia de Max"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Max y su nueva vida en el campo</h3>
                        <p class="text-gray-600">Max fue adoptado por una familia del campo. Ahora corre libremente por
                            los
                            prados y juega todos los días.</p>
                    </article>
                    <!-- Historia 3 -->
                    <article class="bg-white shadow-lg hover:shadow-xl transition-shadow rounded-lg p-6 text-center">
                        <img src="../images/perroconabuela.jpeg" alt="Historia de Coco"
                            class="h-40 w-60 mx-auto mb-4 rounded-lg object-cover" />
                        <h3 class="text-xl font-bold mb-2">Coco: el compañero inseparable</h3>
                        <p class="text-gray-600">Coco es el mejor amigo de su dueña, quien lo describe como su compañero
                            inseparable.</p>
                    </article>
                </div>
            </section>
        </section>
    </main>

    <!-- Incluir el footer -->
    <?php include 'footer.php'; ?>
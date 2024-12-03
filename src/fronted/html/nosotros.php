<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nosotros</title>
    <!-- Tailwind CSS Link -->
    <link href="../../output.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <!-- SWIPER JS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>

    <!-- TEMPORARILY USING GOOGLE FONTS FROM SERVER -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500&display=swap" rel="stylesheet"> -->
</head>

<body>
<main>
    <!-- Contenido principal -->
    <section class="flex-grow  h-screen">
        <!-- Contenido cabecero -->
        
            <section class="relative w-full">
                <div class="w-full mt-16 h-72 bg-cover bg-center"
                    style="background-image: url('../images/nosotros/imagen-nosotros.webp');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="absolute inset-0 flex justify-center items-center">
                        <h1 class="text-white text-5xl md:text-7xl font-bold">Nosotros</h1>
                    </div>
                </div>
            </section>
        
        <!-- Sección de contenido e imagen 01" -->

        <section
            class="py-5 md:py-10 px-4 md:px-20 bg-gradient-to-r from-blue-50 from-50% via-blue-50 via-30% to-blue-100 to-50%  ">

            <!-- Nuevo contenido -->
            <div
                class="container flex flex-col-reverse items-center px-12 mx-auto mt-10 space-y-0 md:flex-row md:space-y-0">
                <!-- LEFT COLUMN -->
                <div class="flex flex-col mb-2 space-y-12 md:mb-32 md:w-1/2">
                    <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left text-blue-800">Ellos se
                        merecen lo mejor</h1>
                    <p class="max-w-sm text-center text-darkGrayishBlue sm:mx-auto lg:mx-0 md:text-left text-blue-950">
                        Por eso es que queremos mostrarte todas las opciones posibles que tienen tus mascotas para recibir la 
                        mejor atención por parte de profesionales de calidad y 100% confiables.<br>
                        Y recuerda que...cada tip, consejo, lugar, experiencia y sentimiento es un pequeño aporte que en
                        su conjunto transporta a tu mascota a una nueva y espectacular vivencia para su vida.</p>
                    <!-- <div class="button flex justify-center md:justify-start">
            <a href="#"
                class="cta-button p-3 px-6 pt-2 text-veryLightGray bg-brightRed rounded-full baseline transition ease-in drop-shadow-2xl shadow-brightRed hover:bg-brightRedLight">Get
                Started</a>
            </div> -->
                </div>
                <!-- RIGHT COLUMN -->
                <div class="md:w-1/2">
                    <img src="../images/nosotros/perros01.png" alt="imagen de perro y gato generado con IA">
                </div>
            </div>
        </section>
        <!-- FEATURES SECTION -->
        <section id="features"
            class="py-5 md:py-10 px-4 md:px-20 bg-gradient-to-r from-blue-50 from-50% via-blue-50 via-30% to-blue-100 to-50%">
            <!-- FLEX CONTAINER -->
            <div class="container flex flex-col mx-auto mt-10 space-y-12 sm:px-2 md:space-y-0 md:px-12 md:flex-row">
                <!-- LEFT INFO COLUMN -->
                <div class="flex-col space-y-12 h-full md:w-1/2">
                    <h2 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left text-blue-800">
                        Misión y Valores
                    </h2>
                    <p class="max-w-sm text-center text-darkGrayishBlue lg:mx-0 sm:mx-auto md:text-left text-blue-950">
                        Nuestra Misión es que toda mascota viva feliz y sana. Nosotros sabemos que no es una tarea
                        fácil, por eso queremos brindarte toda la información posible sobre diversos servicios para mascotas
                        que harán posible lograr su bienestar integral.
                        <br><br>Como equipo queremos mejorar cada día practicando siempre nuestro 3 principales valores:
                    </p>
                </div>

                <!-- FEATURES LIST COLUMN -->
                <div class="flex flex-col space-y-12 md:px-12 md:w-1/2">

                    <!-- LIST ITEM 1 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div
                                    class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1 text-blue-900">
                                    01
                                </div>

                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block text-blue-900">
                                Fiabilidad
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left text-blue-950">
                                La información y espacio que te brindamos es 100% fiable. Por lo que puedes estar seguro
                                que tu
                                mascota
                                tendrá la atención que se merece y en las manos de excelentes profesionales.</p>
                        </div>
                    </div>

                    <!-- LIST ITEM 2 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div
                                    class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1 text-blue-900">
                                    02
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block text-blue-900">
                                Calidad en Servicios
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left text-blue-950">
                                Como equipo buscamos ofrecer la mejor opción a las necesidades que tienen tus mascotas
                                siempre y
                                cuando se encuentre ubicado
                                en la ciudad de Piura.</p>
                        </div>
                    </div>

                    <!-- LIST ITEM 3 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- HEADING -->
                        <div class="rounded-l-full bg-brightRedSuperLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <!-- NUMBER LOZENGE -->
                                <div
                                    class="px-5 py-2 font-bold text-veryLightGray rounded-full bg-brightRed md:py-1 text-blue-900">
                                    03
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block text-blue-900">
                                Compromiso y responsabilidad
                            </h3>
                            <p class="text-darkGrayishBlue text-center lg:mx-0 sm:mx-auto md:text-left text-blue-950">
                                No tienes que preocuparte por el estado de tu mascota, pues los encargados de su cuidado
                                te darán la
                                seguridad y la certeza
                                de que se encuentra en manos de profesionales comprometidos y responsables en lo que
                                hacen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION DE UBICACION -->
        <section class="bg-white bg-gradient-to-r from-blue-100 from-30% via-blue-100 via-30% to-blue-200 to-90%">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm">
                    <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-blue-900">Ubicación</h2>
                    <p class="mb-8 font-light lg:mb-4 sm:text-xl text-blue-950">
                        ¡Ven con tu mascota querida a nuestra tienda física, nosotros te brindamos la mejor atención!</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3156.056529599294!2d-80.64119993147855!3d-5.182512845939182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a1bdf91d8b825%3A0xa4bfa3480b1255ea!2sUniversidad%20Tecnol%C3%B3gica%20Del%20Per%C3%BA!5e0!3m2!1ses!2spe!4v1729006024112!5m2!1ses!2spe" 
                            width="700" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <div id="map" class="w-full h-96"></div>
                    <script src="../js/script_ubicacion.js"></script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script> -->
                </div>
            </div>
        </section>

        <!-- SECTION TESTIMONIOS-->
        
        <section class="bg-white bg-gradient-to-r from-blue-100 from-30% via-blue-100 via-30% to-blue-200 to-90%"
            id="testimonios">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm">
                    <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-blue-900">Testimonios</h2>
                    <p class=" font-light  sm:text-xl text-blue-950">
                        Nuestros usuarios recomiendan el trabajo que realizamos. Y tú, ¿ya adquiriste los servicio de
                        PetServices?</p>
                    <?php
                        include '../nosotros/testimonios.php';
                    ?>
                </div>
        </section>
        <!-- Incluir el footer -->
        <?php include 'footer.php'; ?>
        <script src="../js/main.js"></script>
    </section>
    </main>

</body>

</html>
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
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <link rel="shortcut icon" href="src/img/favicon-32x32.png" type="image/x-icon" sizes="32x32">
    <!-- SWIPER JS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>

    <!-- TEMPORARILY USING GOOGLE FONTS FROM SERVER -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500&display=swap" rel="stylesheet">
</head>

<body>
<main>
    <!-- Contenido principal -->
    <section class="flex-grow  h-screen">
        <!-- Contenido cabecero -->
        
            <section class="relative w-full">
                <div class="w-full mt-16 h-72 bg-cover bg-center"
                    style="background-image: url('images/imagen-nosotros.webp');">
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
                        merecen
                        lo mejor</h1>
                    <p class="max-w-sm text-center text-darkGrayishBlue sm:mx-auto lg:mx-0 md:text-left text-blue-950">
                        Por eso es que queremos
                        mostrarte todas las opciones
                        posibles que tienen tus mascotas para recibir la mejor atención por parte de profesionales de
                        calidad y
                        100% confiables.<br>
                        Y recuerda que...cada tip, consejo, lugar, experiencia y sentimiento es un pequeño aporte que en
                        su
                        conjunto transporta a tu mascota
                        a una nueva y espectacular vivencia para su vida.</p>
                    <!-- <div class="button flex justify-center md:justify-start">
              <a href="#"
                class="cta-button p-3 px-6 pt-2 text-veryLightGray bg-brightRed rounded-full baseline transition ease-in drop-shadow-2xl shadow-brightRed hover:bg-brightRedLight">Get
                Started</a>
            </div> -->
                </div>
                <!-- RIGHT COLUMN -->
                <div class="md:w-1/2">
                    <img src="images/perros01.png" alt="imagen de perro y gato generado con IA">
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
                        fácil,
                        por eso queremos brindarte toda la información posible sobre diversos servicios para mascotas
                        que harán
                        posible lograr su bienestar integral.
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

        <!-- SECTION TESTIMONIOS-->
        <section class="bg-white bg-gradient-to-r from-blue-100 from-30% via-blue-100 via-30% to-blue-200 to-90%"
            id="testimonios">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm">
                    <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-blue-900">Testimonios</h2>
                    <p class="mb-8 font-light lg:mb-16 sm:text-xl text-blue-950">
                        Nuestros usuarios recomiendan el trabajo que realizamos. Y tú, ¿ya adquiriste los servicio de
                        PetServices?</p>
                </div>
                <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">
                    <figure
                        class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r dark:bg-blue-600 dark:border-blue-900">
                        <blockquote class="mx-auto mb-8 max-w-2xl text-white dark:text-white">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Fácil y Organizado</h3>
                            <p class="my-4">"Me encanta la organización de la página, es muy fácil encontrar los
                                servicios que necesito para mis mascotas.
                                La sección de PetFriendly es super útil, ¡Me ha llamado mucho la atención y la estoy
                                recomendando a toda mi familia y amigos!"</p>
                        </blockquote>
                        <figcaption class="flex justify-center items-center space-x-3">
                            <img class="w-9 h-9 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                                alt="usuario mujer">
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div>Laura García</div>
                                <div class="text-sm font-light text-white dark:text-white">Usuaria de PetServices</div>
                            </div>
                        </figcaption>
                    </figure>
                    <figure
                        class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 dark:bg-blue-600 dark:border-blue-900">
                        <blockquote class="mx-auto mb-8 max-w-2xl text-white dark:text-white">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Experiencia Agradable y
                                Satisfactoria</h3>
                            <p class="my-4">"Utilizar esta página ha sido una experiencia bastante satisfactoria. Pude
                                reservar la consulta de mi gato sin problemas.
                                También me llamó la atención que ofrecen una tienda en línea con productos recomendados
                                por veterinarios,
                                lo que me dio más confianza para comprar algunos suplementos."</p>
                        </blockquote>
                        <figcaption class="flex justify-center items-center space-x-3">
                            <img class="w-9 h-9 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                                alt="usuario mujer">
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div>María Saldarriaga</div>
                                <div class="text-sm font-light text-white dark:text-white">Usuaria de PetServices</div>
                            </div>
                        </figcaption>
                    </figure>
                    <figure class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 lg:border-b-0 md:p-12 lg:border-r 
                              dark:bg-blue-600 dark:border-blue-950">
                        <blockquote class="mx-auto mb-8 max-w-2xl text-white dark:text-white">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Atractivo y Moderno</h3>
                            <p class="my-4">"La página de esta veterinaria tiene un diseño atractivo y moderno, lo que
                                la hace agradable a la vista. Pude encontrar
                                rápidamente la información sobre los servicios que ofrecen y la atención en las
                                veterinarias es inmediata lo cual es muy importante para mí porque tengo
                                una perrita mayor que requiere cuidados especiales."</p>
                        </blockquote>
                        <figcaption class="flex justify-center items-center space-x-3">
                            <img class="w-9 h-9 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="usuario hombre">
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div>Pedro Quintana</div>
                                <div class="text-sm font-light text-white dark:text-white">Usuario de PetServices</div>
                            </div>
                        </figcaption>
                    </figure>
                    <figure
                        class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-gray-200 md:p-12 dark:bg-blue-600 dark:border-blue-950">
                        <blockquote class="mx-auto mb-8 max-w-2xl text-white dark:text-white">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Completa y Profesional</h3>
                            <p class="my-4">"Ofrecen una variedad de servicios muy bien explicados, desde cirugías hasta
                                asesoramiento para mi mascota.
                                También tienen un blog con artículos muy actualizados sobre temas de salud animal, lo
                                cual aprecio mucho porque me gusta
                                informarme sobre los cuidados que necesita mi perro."</p>
                        </blockquote>
                        <figcaption class="flex justify-center items-center space-x-3">
                            <img class="w-9 h-9 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                                alt="usuario hombre">
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div>Max García</div>
                                <div class="text-sm font-light text-white dark:text-white">Usuario de PetServices</div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="text-center">
                    <a href="#" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-blue-900 
                focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4
                focus:ring-gray-200 dark:focus:ring-blue-700 dark:bg-blue-800 dark:text-white dark:border-blue-600 dark:hover:text-white
                dark:hover:bg-blue-700 dark:hover:border-blue-950">Leer más</a>
                </div>
        </section>
        <footer class="bg-blue-700 flex flex-col sm:flex-row justify-around p-10 items-center relative">
        <!-- Logo y texto -->
        <div class="w-full sm:w-1/3 text-center mb-6 sm:mb-0">
            <img src="images/Logo.png" alt="Logo" class="mx-auto h-24 w-auto mb-2" />
            <h2 class="font-extrabold text-white text-xs">
                Al igual que tú, Petservices busca lo mejor para tu mascota.
                Encuentra toda clase de servicios en nuestro directorio especialmente para ellos</h2>
        </div>

        <!-- Sección de Contacto -->
        <div class="w-full sm:w-1/3 text-center">
            <h2 class="font-extrabold text-white text-xl mb-4">Contacto</h2>
            <ul class="text-white space-y-2">
                <li>Teléfono: +51 999 999 999</li>
                <li>Email: info@petservices.pe</li>
                <li>Dirección: Piura, Perú</li>
            </ul>
        </div>
        <div class="absolute bottom-0 left-0 w-full text-center p-2 bg-blue-700">
            <p class="text-white text-sm">© 2024 Petservices. Todos los derechos reservados.</p>
        </div>

    </footer>
    </section>
    </main>
    
    <script src="ocultar_mostrar.js">
    </script>

</body>

</html>
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
    <link rel="stylesheet" href="../css/banner.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

</head>

<body class="min-h-screen flex flex-col body1">
    <!-- BANNER PRINCIPAL -->
    <section class="mt-12">
    <div class="banner-container">
        <div class="slide active" style="background-image: url('../images/banner/banner1.jpg')">
            <div class="slide-content">
                <h2 class="slide-title">Cuidamos de tus mascotas</h2>
                <p class="slide-subtitle">Atención veterinaria profesional y personalizada</p>
                <a href="../veterinarios/menuveterinario.php"><button class="cta-button">Reserva ahora</button></a>
            </div>
        </div>
        <div class="slide" style="background-image: url('../images/banner/banner2.jpg')">
            <div class="slide-content">
                <h2 class="slide-title">Servicios exclusivos para su Mascota</h2>
                <p class="slide-subtitle">Variedad de servicios para Mascotas</p>
                <a href="../Servicios/servicios.php"><button class="cta-button">Contactar</button></a>
            </div>
        </div>
        <div class="slide" style="background-image: url('../images/banner/banner3.jpg')">
            <div class="slide-content">
                <h2 class="slide-title">No compres, Adopta!</h2>
                <p class="slide-subtitle">Miles de animalitos en la calle, dales una oportunidad😿
                </p>
                <a href="../adopcion_html/adopcion.php"><button class="cta-button">Más información</button></a>
            </div>
        </div>

        <div class="banner-arrow prev">❮</div>
        <div class="banner-arrow next">❯</div>
        
        <div class="banner-nav">
            <div class="banner-dot active"></div>
            <div class="banner-dot"></div>
            <div class="banner-dot"></div>
        </div>
    </div>
    </section>
    <main class="flex-grow">
        <section class="flex-grow  mb-40">

            <!-- Directorio de Servicios -->
            <section class="mt-12">
                <div>
                    <h2
                        class="text-center text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 drop-shadow-lg mb-8 tracking-wide">
                        Directorio de Servicios para Mascotas
                    </h2>
                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto place-items-center">
                    <!-- Tarjeta 1: Veterinarios -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/doctor.png" alt="Veterinarios" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Veterinarios</h2>
                                <p class="mt-2 text-sm text-gray-500">Especialistas en cuidado de tu mascota.</p>
                            </div>
                            <a href="http://localhost/petservices/src/fronted/veterinarios/menuveterinario.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta 2: Pet Shop -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/pet-shopicon.png" alt="Pet Shop" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Pet Shop</h2>
                                <p class="mt-2 text-sm text-gray-500">Todo lo que tu mascota necesita.</p>
                            </div>
                            <a href="../Tienda/petshop.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta 3: Peluquería -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/peluqueriaperros.png" alt="Peluquería" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Peluquería</h2>
                                <p class="mt-2 text-sm text-gray-500">Servicios de estética para tu mascota.</p>
                            </div>
                            <a href="../Servicios/servicios.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta 4: Servicios Adicionales -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/ayuda.png" alt="Servicios Adicionales" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Servicios Adicionales</h2>
                                <p class="mt-2 text-sm text-gray-500">Servicios complementarios para tu mascota.</p>
                            </div>
                            <a href="../Servicios/servicios.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta 5: Guardería -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/signo-de-hotel-para-mascotas.png" alt="Guardería" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Guardería</h2>
                                <p class="mt-2 text-sm text-gray-500">Cuidado para tu mascota cuando no estás en casa.
                                </p>
                            </div>
                            <a href="../adopcion_html/adopcion.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta 6: Adopción De Mascotas -->
                    <div
                        class="bg-white w-[320px] rounded-[30px] flex flex-col justify-center items-center hover:shadow-lg min-h-[280px] relative group my-4">
                        <div class="m-5">
                            <div class="w-12 h-12 flex items-center justify-center absolute inset-x-0 top-0 ml-6 mt-6">
                                <img src="../images/perro y gato.png" alt="Adopción De Mascotas" />
                            </div>
                            <div class="mt-4 text-left w-full mb-3">
                                <h2 class="text-2xl roboto-mono-500 text-gray-800">Adopción De Mascotas</h2>
                                <p class="mt-2 text-sm text-gray-500">Encuentra a tu nuevo compañero de vida.</p>
                            </div>
                            <a href="../adopcion_html/adopcion.php">
                                <div
                                    class="bg-gray-300 w-10 h-10 rounded-full absolute bottom-0 left-0 m-4 flex justify-center items-center hover:ring-4 ring-gray-200 transition duration-700 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 18.256 18.256" style="transition:.3s">
                                        <g transform="translate(5.363 5.325)">
                                            <path d="M14.581,7.05,7.05,14.581" transform="translate(-7.05 -7.012)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                            <path d="M10,7l5.287.037.038,5.287" transform="translate(-7.756 -7)"
                                                fill="none" stroke="#0D1117" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"></path>
                                        </g>
                                        <path d="M0,0H18.256V18.256H0Z" fill="none"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>




            


            <!-- Noticias sobre Mascotas -->
            <section class="mt-16 m-12">
                <h2 class="text-center text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 drop-shadow-lg mb-8 tracking-wide">
                    Noticias sobre Mascotas
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                    <!-- Noticia 1 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/perroygatojuntos.jpg" alt="Perros y gatos"
                                class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Perros y gatos: los mejores compañeros
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                Un reciente estudio revela que las mascotas pueden mejorar la salud mental de las
                                personas.
                            </p>
                        </div>
                        
                    </div>

                    <!-- Noticia 2 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/Consejos-refrescantes-dias-calurosos.jpg"
                                alt="Consejos para días calurosos" class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Cómo cuidar a tu mascota en días calurosos
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                Consejos prácticos para mantener a tu perro fresco y saludable en el verano.
                            </p>
                        </div>
                        
                    </div>

                    <!-- Noticia 3 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/adoptar.jpeg" alt="Adopción de mascotas"
                                class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Adopta, no compres: la importancia de la adopción
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                La adopción de mascotas es un acto de amor que ayuda a salvar vidas y a dar una segunda
                                oportunidad.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </section>


            <!-- Historias Felices -->
            <section class="mt-16 m-12">
                <h2 class="text-center text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 drop-shadow-lg mb-8 tracking-wide">
                    Historias Felices
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
                    <!-- Historia 1 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/gatocallejero.jpeg" alt="Historia de Luna"
                                class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Luna: de la calle a un hogar lleno de amor
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                Luna fue rescatada de las calles y ahora vive feliz con su nueva familia, disfrutando de
                                largos paseos.
                            </p>
                        </div>
                        
                    </div>

                    <!-- Historia 2 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/perrodecampo.jpeg" alt="Historia de Max"
                                class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Max y su nueva vida en el campo
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                Max fue adoptado por una familia del campo. Ahora corre libremente por los prados y
                                juega todos los días.
                            </p>
                        </div>
                        
                    </div>

                    <!-- Historia 3 -->
                    <div
                        class="relative flex w-full md:w-[350px] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mx-auto mb-10">
                        <div
                            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                            <img src="../images/perroconabuela.jpeg" alt="Historia de Coco"
                                class="h-full w-full object-cover rounded-xl" />
                        </div>
                        <div class="p-6">
                            <h5
                                class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                Coco: el compañero inseparable
                            </h5>
                            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                Coco es el mejor amigo de su dueña, quien lo describe como su compañero inseparable.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </section>

        </section>
    </main>

    <!-- Incluir el footer -->
    <?php include 'footer.php'; ?>
<script>
 document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.banner-dot');
            const prevBtn = document.querySelector('.banner-arrow.prev');
            const nextBtn = document.querySelector('.banner-arrow.next');
            let currentSlide = 0;
            let isAnimating = false;

            function goToSlide(index) {
                if (isAnimating) return;
                isAnimating = true;

                // Desactivar slide actual
                slides[currentSlide].classList.remove('active');
                dots[currentSlide].classList.remove('active');

                // Actualizar índice
                currentSlide = index;
                if (currentSlide >= slides.length) currentSlide = 0;
                if (currentSlide < 0) currentSlide = slides.length - 1;

                // Activar nuevo slide
                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');

                // Pequeña animación del contenido
                const content = slides[currentSlide].querySelector('.slide-content');
                content.style.transform = 'translate(-50%, -45%)';
                setTimeout(() => {
                    content.style.transform = 'translate(-50%, -50%)';
                }, 300);

                setTimeout(() => {
                    isAnimating = false;
                }, 800);
            }

            // Auto avance
            let slideInterval = setInterval(() => {
                goToSlide(currentSlide + 1);
            }, 5000);

            // Eventos de navegación
            prevBtn.addEventListener('click', () => {
                clearInterval(slideInterval);
                goToSlide(currentSlide - 1);
                slideInterval = setInterval(() => {
                    goToSlide(currentSlide + 1);
                }, 5000);
            });

            nextBtn.addEventListener('click', () => {
                clearInterval(slideInterval);
                goToSlide(currentSlide + 1);
                slideInterval = setInterval(() => {
                    goToSlide(currentSlide + 1);
                }, 5000);
            });

            // Eventos para los dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    if (currentSlide !== index) {
                        clearInterval(slideInterval);
                        goToSlide(index);
                        slideInterval = setInterval(() => {
                            goToSlide(currentSlide + 1);
                        }, 5000);
                    }
                });
            });

            // Pausar en hover
            document.querySelector('.banner-container').addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            document.querySelector('.banner-container').addEventListener('mouseleave', () => {
                slideInterval = setInterval(() => {
                    goToSlide(currentSlide + 1);
                }, 5000);
            });
        });
    </script>
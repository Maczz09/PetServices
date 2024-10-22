<?php 
include '../html/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Adopcion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
      .mascota-img {
        height: 200px; /* Ajusta la altura según sea necesario */
        object-fit: cover; /* Mantiene la proporción de la imagen */
      }
    </style>
    
  </head>

  <body>
    <!-- Contenido principal -->
    <main class=" bg-slate-200 mt-20 p-6">
      <!-- Banner -->
<header class="bg-cover bg-center h-[30rem]" style="background-image: url('../images/adopcion/adopcion_15.jpg');">
    <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
        <h1 class="text-white text-5xl font-bold">Mascotas en Adopción</h1>
    </div>
</header>
<section class="bg-slate-200 flex-1">
  <div class="container mx-auto py-10 flex">
    <aside class="w-full bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-6">Filtrar por:</h2>
      <form id="filtro-form" class="flex flex-wrap gap-8">

        <!-- Filtro Actividad -->
<div class="relative flex-1 min-w-[200px]">
  <details class="group [&_summary::-webkit-details-marker]:hidden">
    <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
      <span class="text-sm font-medium">Actividad</span>
      <span class="transition group-open:-rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </span>
    </summary>

    <!-- Caja de opciones desplegable del filtro -->
    <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
      <div class="w-64 rounded border border-gray-200 bg-white">
        <header class="flex items-center justify-between p-4">
          <span class="text-sm text-gray-700">0 Seleccionado</span>
          <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
            Reset
          </button>
        </header>

        <!-- Opciones del filtro -->
        <ul id="actividad-list" class="space-y-1 border-t border-gray-200 p-4 transition-all duration-500">
          <li>
            <label for="actividad_alta" class="inline-flex items-center gap-2">
              <input type="checkbox" name="actividad[]" value="Alta" id="actividad_alta" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Alta</span>
            </label>
          </li>

          <li>
            <label for="actividad_media" class="inline-flex items-center gap-2">
              <input type="checkbox" name="actividad[]" value="Media" id="actividad_media" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Media</span>
            </label>
          </li>

          <li>
            <label for="actividad_baja" class="inline-flex items-center gap-2">
              <input type="checkbox" name="actividad[]" value="Baja" id="actividad_baja" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Baja</span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </details>
</div>

        <!-- Filtro Peso -->
<div class="relative flex-1 min-w-[200px]">
  <details class="group [&_summary::-webkit-details-marker]:hidden">
    <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
      <span class="text-sm font-medium">Peso</span>
      <span class="transition group-open:-rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </span>
    </summary>

    <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
      <div class="w-64 rounded border border-gray-200 bg-white">
        <header class="flex items-center justify-between p-4">
          <span class="text-sm text-gray-700">0 Seleccionado</span>
          <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
            Reset
          </button>
        </header>

        <ul id="peso-list" class="space-y-1 border-t border-gray-200 p-4 transition-all duration-500">
          <li>
            <label for="peso_0_5kg" class="inline-flex items-center gap-2">
              <input type="checkbox" name="peso[]" value="0-5kg" id="peso_0_5kg" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">0-5 kg</span>
            </label>
          </li>

          <li>
            <label for="peso_5_10kg" class="inline-flex items-center gap-2">
              <input type="checkbox" name="peso[]" value="5-10kg" id="peso_5_10kg" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">5-10 kg</span>
            </label>
          </li>

          <li>
            <label for="peso_10_20kg" class="inline-flex items-center gap-2">
              <input type="checkbox" name="peso[]" value="10-20kg" id="peso_10_20kg" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">10-20 kg</span>
            </label>
          </li>

          <li>
            <label for="peso_20kg_plus" class="inline-flex items-center gap-2">
              <input type="checkbox" name="peso[]" value="20kg+" id="peso_20kg_plus" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Más de 20 kg</span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </details>
</div>


        <!-- Filtro Tamaño -->
<div class="relative flex-1 min-w-[200px]">
  <details class="group [&_summary::-webkit-details-marker]:hidden">
    <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
      <span class="text-sm font-medium">Tamaño</span>
      <span class="transition group-open:-rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </span>
    </summary>

    <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
      <div class="w-64 rounded border border-gray-200 bg-white">
        <header class="flex items-center justify-between p-4">
          <span class="text-sm text-gray-700">0 Seleccionado</span>
          <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
            Reset
          </button>
        </header>

        <ul id="tamano-list" class="space-y-1 border-t border-gray-200 p-4 transition-all duration-500">
          <li>
            <label for="tamano_pequeno" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tamano[]" value="Pequeño" id="tamano_pequeno" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Pequeño</span>
            </label>
          </li>

          <li>
            <label for="tamano_mediano" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tamano[]" value="Mediano" id="tamano_mediano" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Mediano</span>
            </label>
          </li>

          <li>
            <label for="tamano_grande" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tamano[]" value="Grande" id="tamano_grande" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Grande</span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </details>
</div>


        <!-- Filtro Tipo de Mascota -->
<div class="relative flex-1 min-w-[200px]">
  <details class="group [&_summary::-webkit-details-marker]:hidden">
    <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
      <span class="text-sm font-medium">Tipo de Mascota</span>
      <span class="transition group-open:-rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </span>
    </summary>

    <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
      <div class="w-64 rounded border border-gray-200 bg-white">
        <header class="flex items-center justify-between p-4">
          <span class="text-sm text-gray-700">0 Seleccionado</span>
          <button type="button" class="text-sm text-gray-900 underline underline-offset-4" id="reset-tipo-mascota">
            Reset
          </button>
        </header>

        <ul id="tipo-mascota-list" class="space-y-1 border-t border-gray-200 p-4 transition-all duration-500">
          <li>
            <label for="tipo_perro" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tipo_mascota[]" value="Perro" id="tipo_perro" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Perro</span>
            </label>
          </li>

          <li>
            <label for="tipo_gato" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tipo_mascota[]" value="Gato" id="tipo_gato" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Gato</span>
            </label>
          </li>

          <li>
            <label for="tipo_conejo" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tipo_mascota[]" value="Conejo" id="tipo_conejo" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Conejo</span>
            </label>
          </li>

          <li>
            <label for="tipo_ave" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tipo_mascota[]" value="Ave" id="tipo_ave" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Ave</span>
            </label>
          </li>

          <li>
            <label for="tipo_otros" class="inline-flex items-center gap-2">
              <input type="checkbox" name="tipo_mascota[]" value="Otros" id="tipo_otros" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Otros</span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </details>
</div>


        <!-- Filtro Sexo -->
<div class="relative flex-1 min-w-[200px]">
  <details class="group [&_summary::-webkit-details-marker]:hidden">
    <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
      <span class="text-sm font-medium">Sexo</span>
      <span class="transition group-open:-rotate-180">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </span>
    </summary>

    <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
      <div class="w-64 rounded border border-gray-200 bg-white">
        <header class="flex items-center justify-between p-4">
          <span class="text-sm text-gray-700">0 Seleccionado</span>
          <button type="button" class="text-sm text-gray-900 underline underline-offset-4" id="reset-genero">
            Reset
          </button>
        </header>

        <ul id="genero-list" class="space-y-1 border-t border-gray-200 p-4 transition-all duration-500">
          <li>
            <label for="sexo_macho" class="inline-flex items-center gap-2">
              <input type="checkbox" name="genero[]" value="Macho" id="genero_macho" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Macho</span>
            </label>
          </li>

          <li>
            <label for="sexo_hembra" class="inline-flex items-center gap-2">
              <input type="checkbox" name="genero[]" value="Hembra" id="genero_hembra" class="size-5 rounded border-gray-300" />
              <span class="text-sm font-medium text-gray-700">Hembra</span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </details>
</div>

        <button type="submit" class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600">
          Filtrar
        </button>
      </form>
    </aside>
  </div>
</section>

        <!-- Lista de Mascotas -->
<section class="w-3/4 ml-6">
    <h2 class="text-2xl font-bold mb-6">Mascotas Disponibles</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mascotas-list">
        <?php
        include_once '../../backend/config/Database.php';
        // Conexión a la base de datos
        $database = new Database();
        $conexion = $database->getConexion();

        // Consulta para obtener las mascotas
        $sql = "SELECT * FROM mascotas";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($mascota = $result->fetch_assoc()) {
                echo '<a href="#" class="group relative block bg-black">';
                echo '<img
                    alt="' . htmlspecialchars($mascota['nombre']) . '"
                    src="' . htmlspecialchars($mascota['foto']) . '"
                    class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50"
                />';

                echo '<div class="relative p-4 sm:p-6 lg:p-8">';
                echo '<p class="text-sm font-medium uppercase tracking-widest text-pink-500">' . htmlspecialchars($mascota['tipo_mascota']) . '</p>';
                echo '<p class="text-xl font-bold text-white sm:text-2xl">' . htmlspecialchars($mascota['nombre']) . '</p>';
                echo '<div class="mt-32 sm:mt-48 lg:mt-64">';
                echo '<div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">';
                echo '<p class="text-sm text-white">';
                echo 'Edad: ' . $mascota['edad'] . ' años, ' . $mascota['edad_meses'] . ' meses<br>';
                echo 'Sexo: ' . htmlspecialchars($mascota['genero']) . '<br>';
                echo 'Tamaño: ' . htmlspecialchars($mascota['tamano']) . '<br>';
                echo 'Actividad: ' . htmlspecialchars($mascota['actividad']) . '<br>';
                echo 'Peso: ' . htmlspecialchars($mascota['peso']) . '<br>';
                echo 'Enfermedad: ' . htmlspecialchars($mascota['enfermedad'] ?: 'Ninguna') . '<br>';
                echo '</p>';
                echo '</div>';
                echo '</div>';

                // Botón de solicitar adopción
                echo '<form method="POST" action="solicitar_adopcion.php">';
                echo '<input type="hidden" name="id_mascota" value="' . $mascota['id'] . '">';
                echo '<button type="submit" class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600" onclick="return verificarSesion()">Solicitar Adopción</button>';
                echo '</form>';

                echo '</div>'; // Cierre de <div class="relative p-4 sm:p-6 lg:p-8">
                echo '</a>';   // Cierre de <a href="#" class="group relative block bg-black">
            }
        } else {
            echo '<p>No hay mascotas disponibles para adopción en este momento.</p>';
        }

        $conexion->close();
        ?>
    </div>
</section>

<script>
    function verificarSesion() {
        <?php if (!isset($_SESSION['idusuario'])) { ?>
            alert("Necesita iniciar sesión para solicitar la adopción");
            return false;
        <?php } ?>
    }
</script>

      </section>

      
<!-- Historias de Adopciones -->
<link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

<script type="module">
  import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

  const keenSlider = new KeenSlider(
    '#keen-slider',
    {
      loop: true,
      slides: {
        origin: 'center',
        perView: 1.25,
        spacing: 16,
      },
      breakpoints: {
        '(min-width: 1024px)': {
          slides: {
            origin: 'auto',
            perView: 2.5,
            spacing: 32,
          },
        },
      },
    },
    []
  )

  const keenSliderPrevious = document.getElementById('keen-slider-previous')
  const keenSliderNext = document.getElementById('keen-slider-next')

  keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
  keenSliderNext.addEventListener('click', () => keenSlider.next())
</script>

<section class="bg-gray-50">
  <div class="mx-auto max-w-[1340px] px-4 py-12 sm:px-6 lg:me-0 lg:py-16 lg:pe-0 lg:ps-8 xl:py-24">
    <div class="max-w-7xl items-end justify-between sm:flex sm:pe-6 lg:pe-8">
      <h2 class="max-w-xl text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
        Historias Felices
      </h2>

      <div class="mt-8 flex gap-4 lg:mt-0">
        <button
          aria-label="Previous slide"
          id="keen-slider-previous"
          class="rounded-full border border-rose-600 p-3 text-rose-600 transition hover:bg-rose-600 hover:text-white"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5 rtl:rotate-180"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <button
          aria-label="Next slide"
          id="keen-slider-next"
          class="rounded-full border border-rose-600 p-3 text-rose-600 transition hover:bg-rose-600 hover:text-white"
        >
          <svg
            class="size-5 rtl:rotate-180"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M9 5l7 7-7 7"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            />
          </svg>
        </button>
      </div>
    </div>

    <div class="-mx-6 mt-8 lg:col-span-2 lg:mx-0">
      <div id="keen-slider" class="keen-slider">
        <!-- Tarjeta 1 -->
        <div class="keen-slider__slide">
          <div class="tarjeta flex flex-col overflow-hidden rounded-lg border border-gray-100 shadow-sm h-[450px] relative">
            <img
              alt="Adopción de Max"
              src="../images/adopcion/adopcion_11.jpg"
              class="h-56 w-full object-cover"
            />

            <div class="p-4 sm:p-6 bg-white flex-grow">
              <h3 class="text-lg font-medium text-gray-900">
                La historia de Max
              </h3>

              <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3">
                Max llegó al refugio en mal estado, pero gracias al amor de su nueva familia, ahora es un perro feliz
                y lleno de energía. ¡Una adopción que cambió su vida para siempre!
              </p>

              <a
                href="#"
                class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 absolute bottom-4 left-4"
              >
                Leer más
              </a>
            </div>
          </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="keen-slider__slide">
          <div class="tarjeta flex flex-col overflow-hidden rounded-lg border border-gray-100 shadow-sm h-[450px] relative">
            <img
              alt="Adopción de Luna"
              src="../images/adopcion/adopcion_12.jpg"
              class="h-56 w-full object-cover"
            />

            <div class="p-4 sm:p-6 bg-white flex-grow">
              <h3 class="text-lg font-medium text-gray-900">
                El nuevo hogar de Luna
              </h3>

              <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3">
                Luna fue encontrada en las calles y rescatada por una familia maravillosa. Ahora, disfruta de una vida
                llena de juegos, paseos y mucho amor.
              </p>

              <a
                href="#"
                class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 absolute bottom-4 left-4"
              >
                Leer más
              </a>
            </div>
          </div>
        </div>
        
        <!-- Tarjeta 3 -->
        <div class="keen-slider__slide">
          <div class="tarjeta flex flex-col overflow-hidden rounded-lg border border-gray-100 shadow-sm h-[450px] relative">
            <img
              alt="Adopción de Coco"
              src="../images/adopcion/adopcion_13.jpg"
              class="h-56 w-full object-cover"
            />

            <div class="p-4 sm:p-6 bg-white flex-grow">
              <h3 class="text-lg font-medium text-gray-900">
                La travesura de Coco
              </h3>

              <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3">
                Coco era un perro tímido, pero tras ser adoptado, encontró la confianza y el amor que siempre necesitó.
                ¡Ahora no para de hacer travesuras!
              </p>

              <a
                href="#"
                class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 absolute bottom-4 left-4"
              >
                Leer más
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección del Carrusel de Imágenes -->
<section class="container mx-auto py-10">
  <h2 class="text-3xl font-bold mb-6 text-center">Galería de Mascotas</h2>
  <section>
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
    <header class="text-center">
    </header>

    <ul class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-3">
      <li>
        <a href="#" class="group relative block">
          <img
            src="../images/adopcion/adopcion_7.jpg"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />

          <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
          </div>
        </a>
      </li>

      <li>
        <a href="#" class="group relative block">
          <img
            src="../images/adopcion/adopcion_3.jpg"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />

          <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
          </div>
        </a>
      </li>

      <li class="lg:col-span-2 lg:col-start-2 lg:row-span-2 lg:row-start-1">
        <a href="#" class="group relative block">
          <img
            src="../images/adopcion/adopcion_6.jpg"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />

          <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>
</section>
    </main>

        <!-- Incluir el footer -->
    <?php include '../html/footer.php'; ?>
    <script src="../js/main.js"></script>
    <script src="../js/adopcion.js"></script>

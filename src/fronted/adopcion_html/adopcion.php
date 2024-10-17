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
          <aside class="w-1/4 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Filtrar por:</h2>
            <form id="filtro-form">
              <!-- Filtro Actividad -->
              <div class="mb-4">
                <label
                  for="actividad"
                  class="block text-gray-700 font-bold mb-2"
                  >Actividad</label
                >
                <select
                  id="actividad"
                  name="actividad"
                  class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                  <option value="">Todas</option>
                  <option value="Alta">Alta</option>
                  <option value="Media">Media</option>
                  <option value="Baja">Baja</option>
                </select>
              </div>
              <!-- Filtro Peso -->
              <div class="mb-4">
                <label for="peso" class="block text-gray-700 font-bold mb-2"
                  >Peso</label
                >
                <select
                  id="peso"
                  name="peso"
                  class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                  <option value="">Todos</option>
                  <option value="0-5kg">0-5 kg</option>
                  <option value="5-10kg">5-10 kg</option>
                  <option value="10-20kg">10-20 kg</option>
                  <option value="20kg+">Más de 20 kg</option>
                </select>
              </div>
              <!-- Filtro Tamaño -->
              <div class="mb-4">
                <label for="tamano" class="block text-gray-700 font-bold mb-2"
                  >Tamaño</label
                >
                <select
                  id="tamano"
                  name="tamano"
                  class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                  <option value="">Todos</option>
                  <option value="Pequeño">Pequeño</option>
                  <option value="Mediano">Mediano</option>
                  <option value="Grande">Grande</option>
                </select>
              </div>
              <!-- Filtro Tipo de Mascota -->
              <div class="mb-4">
                <label
                  for="tipo_mascota"
                  class="block text-gray-700 font-bold mb-2"
                  >Tipo de Mascota</label
                >
                <select
                  id="tipo_mascota"
                  name="tipo_mascota"
                  class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                  <option value="">Todas</option>
                  <option value="Perro">Perro</option>
                  <option value="Gato">Gato</option>
                  <option value="Conejo">Conejo</option>
                  <option value="Ave">Ave</option>
                  <option value="Otros">Otros</option>
                </select>
              </div>
              <!-- Filtro Sexo -->
              <div class="mb-4">
                <label
                  for="sexo_mascota"
                  class="block text-gray-700 font-bold mb-2"
                  >Sexo</label
                >
                <select
                  id="sexo_mascota"
                  name="sexo_mascota"
                  class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                  <option value="">Ambos</option>
                  <option value="Macho">Macho</option>
                  <option value="Hembra">Hembra</option>
                </select>
              </div>
              <button
                type="submit"
                class="w-full bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600"
              >
                Filtrar
              </button>
            </form>
          </aside>

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
  </body>
</html>

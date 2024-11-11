<?php include 'session.php'; 
// Asegúrate de incluir el archivo de conexión a la base de datos
include('Database.php');

// Verificar si se ha enviado el ID de la mascota
if (isset($_POST['id_mascota'])) {
    $id_mascota = $_POST['id_mascota'];
    // Aquí puedes mostrar el formulario con el ID de la mascota
} else {
    echo "<script>alert('Error: No se ha proporcionado un ID de mascota.'); window.location.href = 'mascotas.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Adopcion</title>
    <!-- Tailwind CSS Link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind CSS Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css"
    />
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <link
      rel="shortcut icon"
      href="src/img/favicon-32x32.png"
      type="image/x-icon"
      sizes="32x32"
    />
    <!-- SWIPER JS SCRIPT -->
    <script
      src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"
      defer
    ></script>

    <!-- TEMPORARILY USING GOOGLE FONTS FROM SERVER -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@500&display=swap"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Script para el formulario-->
    <script>
        // Realizar una solicitud AJAX para obtener los datos del usuario
        fetch('obtener_datos_usuario_adopcion.php')
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    // Rellenar los campos del formulario con los datos del usuario
                    document.getElementById('nombre_usuario').value = data.nombre;
                    document.getElementById('apellido_usuario').value = data.apellido;
                    document.getElementById('direccion_usuario').value = data.direccion;
                    document.getElementById('email_usuario').value = data.email;
                    document.getElementById('telefono_usuario').value = data.num_telefono;
                } else {
                    console.log('Error: ' + data.error);
                }
            })
            .catch(error => console.log('Error en la solicitud:', error));
    </script>

  </head>
</html>

<body>
  <!-- Barra de navegación -->
  <nav class="bg-blue-400 fixed w-full z-10 top-0">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="#" class="text-white text-3xl font-semibold">
          <img src="images/Logo.png" alt="Logo" class="h-12 w-auto" />
        </a>
      </div>

      <!-- Navegación principal -->
      <div class="hidden md:flex space-x-6">
        <a
          href="adopcion.php"
          class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500"
        >
          <img
            src="images/directorio.png"
            alt="Adopcion"
            class="h-6 w-6 mr-2"
          />
          Adopcion
        </a>
        <a
          href="lugares.php"
          class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500"
        >
          <img
            src="images/lugar.png"
            alt="Lugares PetFriendly"
            class="h-6 w-6 mr-2"
          />
          Lugares PetFriendly
        </a>
        <a
          href="tienda.php"
          class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500"
        >
          <img src="images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
          Tienda
        </a>
        <a
          href="servicios.php"
          class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500"
        >
          <img
            src="images/servicios.png"
            alt="Servicios"
            class="h-6 w-6 mr-2"
          />
          Servicios
        </a>
        <a
          href="nosotros.php"
          class="flex items-center text-white hover:bg-blue-700 py-2 px-4 rounded transition duration-500"
        >
          <img src="images/nosotros.png" alt="Nosotros" class="h-6 w-6 mr-2" />
          Nosotros
        </a>
      </div>

      <!-- Botón de perfil / Iniciar sesión / Registro -->
      <div class="flex items-center">
        <div class="relative">
          <?php if ($isLoggedIn): ?>
          <!-- Si el usuario está conectado -->
          <button
            id="profileBtn"
            class="bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700"
          >
            <i class="fas fa-user"></i>
          </button>
          <div
            id="profileDiv"
            class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white"
          >
            <a href="#" class="block px-4 py-2 text-sm text-gray-700"
              >Tu perfil</a
            >
            <a href="#" class="block px-4 py-2 text-sm text-gray-700"
              >Configuración</a
            >
            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700"
              >Cerrar Sesión</a
            >
          </div>
          <?php else: ?>
          <!-- Si el usuario no está conectado -->
          <a
            href="login.php"
            class="ml-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700"
          >
            <i class="fas fa-sign-in-alt"></i>
          </a>
          <a
            href="register_usuario.php"
            class="ml-4 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700"
          >
            <i class="fas fa-user-plus"></i>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Botón para dispositivos móviles -->
      <div class="md:hidden">
        <button id="menuBtn" class="text-white">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Menú desplegable para móviles -->
    <div id="mobileMenu" class="hidden md:hidden bg-blue-400">
      <a
        href="directorio.php"
        class="flex items-center text-white py-2 px-4 hover:bg-blue-700"
      >
        <img
          src="images/directorio.png"
          alt="Directorio"
          class="h-6 w-6 mr-2"
        />
        Directorio
      </a>
      <a
        href="lugares.php"
        class="flex items-center text-white py-2 px-4 hover:bg-blue-700"
      >
        <img
          src="images/lugar.png"
          alt="Lugares PetFriendly"
          class="h-6 w-6 mr-2"
        />
        Lugares PetFriendly
      </a>
      <a
        href="tienda.php"
        class="flex items-center text-white py-2 px-4 hover:bg-blue-700"
      >
        <img src="images/tienda.png" alt="Tienda" class="h-6 w-6 mr-2" />
        Tienda
      </a>
      <a
        href="servicios.php"
        class="flex items-center text-white py-2 px-4 hover:bg-blue-700"
      >
        <img src="images/servicios.png" alt="Servicios" class="h-6 w-6 mr-2" />
        Servicios
      </a>
      <a
        href="nosotros.php"
        class="flex items-center text-white py-2 px-4 hover:bg-blue-700"
      >
        <img src="images/nosotros.png" alt="Nosotros" class="h-6 w-6 mr-2" />
        Nosotros
      </a>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="bg-slate-200 mt-20 p-6">
    <!-- Banner -->
    <div class="relative bg-cover bg-center h-64" style="background-image: url('images/banner_form_adop.webp');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <h1 class="text-white text-4xl font-bold">Formulario de Adopción</h1>
        </div>
    </div>

   <section class="bg-gray-100">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
      <div class="lg:col-span-2 lg:py-12">
        <img src="images/perros01.png" alt="Imagen" class="w-full h-full object-cover object-center rounded-lg shadow-lg">
      </div>

      <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
        <h2 class="text-2xl font-bold mb-4">Solicitud de Adopción</h2>
        <p class="text-lg text-gray-600 mb-8">Por favor, complete el siguiente formulario para solicitar la adopción de una mascota.</p>

        <form action="procesar_adopcion.php" method="POST" class="space-y-4">
          <!-- Asegúrate de que el id_mascota está siendo pasado correctamente desde mascotas.php -->
          <input type="hidden" name="id_mascota" value="<?php echo htmlspecialchars($_POST['id_mascota']); ?>">

          <!-- Información del usuario -->
           
          <div>
            <label for="nombre_usuario" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <input
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              id="nombre_usuario"
              name="nombre_usuario"
              value="<?php echo isset($usuario_data) ? htmlspecialchars($usuario_data['nombre']) : ''; ?>"
              readonly
            />
          </div>

          <div >
            <label for="apellido_usuario" class="block text-sm font-medium text-gray-700">Apellido:</label>
            <input
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              id="apellido_usuario"
              name="apellido_usuario"
              value="<?php echo isset($usuario_data) ? htmlspecialchars($usuario_data['apellido']) : ''; ?>"
              readonly
            />
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="email_usuario" class="block text-sm font-medium text-gray-700">Email:</label>
              <input
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                id="email_usuario"
                name="email_usuario"
                value="<?php echo isset($usuario_data) ? htmlspecialchars($usuario_data['email']) : ''; ?>"
                readonly
              />
            </div>

            <div>
              <label for="direccion_usuario" class="block text-sm font-medium text-gray-700">Dirección:</label>
              <input
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                id="direccion_usuario"
                name="direccion_usuario"
                value="<?php echo isset($usuario_data) ? htmlspecialchars($usuario_data['direccion']) : ''; ?>"
                readonly
              />
            </div>
          </div>

          <div>
            <label for="telefono_usuario" class="block text-sm font-medium text-gray-700">Teléfono:</label>
            <input
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              id="telefono_usuario"
              name="telefono_usuario"
              value="<?php echo isset($usuario_data) ? htmlspecialchars($usuario_data['num_telefono']) : ''; ?>"
              readonly
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Formulario de información adicional -->
<section class="bg-gray-100">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="rounded-lg bg-white p-8 shadow-lg">
      <h2 class="text-2xl font-bold mb-4">Información adicional</h2>
      <p class="text-lg text-gray-600 mb-8">Por favor, complete la siguiente información adicional.</p>

      <form action="procesar_adopcion.php" method="POST" class="space-y-4" id="adopcionForm">
        <!-- Asegúrate de que el id_mascota está siendo pasado correctamente desde mascotas.php -->
        <input type="hidden" name="id_mascota" value="<?php echo htmlspecialchars($_POST['id_mascota']); ?>">

        <!-- Preguntas de información adicional -->
        <div>
          <label for="pregunta1" class="block text-sm font-medium text-gray-700">1. ¿Por qué desea adoptar una mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta1"
            name="pregunta1"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta2" class="block text-sm font-medium text-gray-700">2. ¿Quién será el propietario de la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta2"
            name="pregunta2"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta3" class="block text-sm font-medium text-gray-700">3. ¿Tiene una vivienda propia o arrienda?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta3"
            name="pregunta3"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta4" class="block text-sm font-medium text-gray-700">4. ¿Qué tipo de vivienda posee?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta4"
            name="pregunta4"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta5" class="block text-sm font-medium text-gray-700">5. ¿Por qué considera apropiado adoptar esta mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta5"
            name="pregunta5"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta6" class="block text-sm font-medium text-gray-700">6. ¿Su familia está de acuerdo con la adopción?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta6"
            name="pregunta6"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta7" class="block text-sm font-medium text-gray-700">7. ¿Qué hará si la mascota llega a enfermarse?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta7"
            name="pregunta7"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta8" class="block text-sm font-medium text-gray-700">8. ¿Ha cambiado de domicilio los últimos años?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta8"
            name="pregunta8"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta9" class="block text-sm font-medium text-gray-700">9. En caso de vivir con niños, ¿Ellos saben cómo cuidar a la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta9"
            name="pregunta9"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta10" class="block text-sm font-medium text-gray-700">10. ¿Usted o alguno de sus convivientes tiene alguna alergia?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta10"
            name="pregunta10"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta11" class="block text-sm font-medium text-gray-700">11. ¿Dispone de tiempo para invertir en la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta11"
            name="pregunta11"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta12" class="block text-sm font-medium text-gray-700">12. ¿Si llega a viajar, con quién quedaría la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta12"
            name="pregunta12"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta13" class="block text-sm font-medium text-gray-700">13. ¿Es la primera mascota que ha adoptado?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta13"
            name="pregunta13"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta14" class="block text-sm font-medium text-gray-700">14. ¿En su hogar convive con otras mascotas?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta14"
            name="pregunta14"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>
        <!-- Comentario -->
          <div class="mt-8">
            <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario:</label>
            <textarea
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              id="comentario"
              name="comentario"
              rows="5"
              oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
              style="resize: none;"
            ></textarea>
          </div>
        <button type="submit" class="w-full rounded-lg bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Enviar</button>
      </form>
    </div>
  </div>
</section>
<!-- Modal de error -->
<div id="errorModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-lg border-s-4 border-red-500 p-6 w-96">
    <div class="flex items-center gap-2 text-red-800">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"/>
      </svg>
      <strong class="block font-medium">Complete los campos requeridos</strong>
    </div>

    <p id="errorText" class="mt-2 text-sm text-red-700"></p>

    <div class="mt-4 text-right">
      <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
    </div>
  </div>
</div>

<!-- Modal de éxito -->
<div id="successModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-xl border border-gray-100 p-6 w-96">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </span>

      <div class="flex-1">
        <strong class="block font-medium text-gray-900"> ¡Formulario enviado con éxito! </strong>
        <p class="mt-1 text-sm text-gray-700">Gracias por completar la información adicional.</p>
      </div>

      <button onclick="closeSuccessModal()" class="text-gray-500 transition hover:text-gray-600">
        <span class="sr-only">Cerrar</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
  </div>
</div>

<script>
  document.getElementById('adopcionForm').addEventListener('submit', function(event) {
    let campos = [
      'pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 
      'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 
      'pregunta9', 'pregunta10', 'pregunta11', 'pregunta12', 
      'pregunta13', 'pregunta14'
    ];
    let error = false;
    let mensajeError = 'Por favor, complete las siguientes preguntas:<br><ul>';

    campos.forEach(function(campo) {
      let valor = document.getElementById(campo).value.trim();
      if (valor === '') {
        let pregunta = document.querySelector("label[for='" + campo + "']").innerText;
        mensajeError += '<li>' + pregunta + '</li>';
        error = true;
      }
    });

    if (error) {
      event.preventDefault(); // Evita que el formulario se envíe si hay errores
      mensajeError += '</ul>';
      document.getElementById('errorText').innerHTML = mensajeError;
      document.getElementById('errorModal').classList.remove('hidden');
    } else {
      // Comentar en producción, para permitir el envío al servidor
      // event.preventDefault();
      document.getElementById('successModal').classList.remove('hidden');
    }
  });

  function closeModal() {
    document.getElementById('errorModal').classList.add('hidden');
  }

  function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
  }
</script>


  </main>

  <footer
    class="bg-blue-700 flex flex-col sm:flex-row justify-around p-10 items-center relative"
  >
    <!-- Logo y texto -->
    <div class="w-full sm:w-1/3 text-center mb-6 sm:mb-0">
      <img src="images/Logo.png" alt="Logo" class="mx-auto h-24 w-auto mb-2" />
      <h2 class="font-extrabold text-white text-xs">
        Al igual que tú, Petservices busca lo mejor para tu mascota. Encuentra
        toda clase de servicios en nuestro directorio especialmente para ellos
      </h2>
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
      <p class="text-white text-sm">
        © 2024 Petservices. Todos los derechos reservados.
      </p>
    </div>
  <script src="ocultar_mostrar.js"></script>
  </body>
</html>

<?php  
// Asegúrate de incluir el archivo de conexión a la base de datos
include('../../backend/config/Database.php');
include 'header.php';

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$conexion = $database->getConexion();

// Verificar si se ha enviado el ID de la mascota
if (isset($_POST['id_mascota'])) {
    $id_mascota = $_POST['id_mascota'];
    
    // Aquí puedes mostrar el formulario con el ID de la mascota
    // Consulta para obtener los detalles de la mascota
    $sql = "SELECT * FROM mascotas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_mascota);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mascota = $result->fetch_assoc();
    } else {
        echo "<script>alert('Error: No se ha encontrado la mascota.'); window.location.href = 'mascotas.php';</script>";
    }
} else {
    echo "<script>alert('Error: No se ha proporcionado un ID de mascota.'); window.location.href = 'mascotas.php';</script>";
}

// Obtener datos del usuario
$usuario_data = [];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['idusuario'])) {
    $idusuario = $_SESSION['idusuario'];
    $query_usuario = "SELECT nombre, apellido, direccion, email, num_telefono FROM usuarios WHERE idusuario = ?";
    
    if ($stmt = $conexion->prepare($query_usuario)) {
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        $stmt->bind_result($nombre, $apellido, $direccion, $email, $num_telefono);
        $stmt->fetch();

        // Guardar datos del usuario en un array
        $usuario_data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion' => $direccion,
            'email' => $email,
            'num_telefono' => $num_telefono
        ];

        $stmt->close();
    } else {
        echo "<script>alert('Error al obtener los datos del usuario.');</script>";
    }
} else {
    echo "<script>alert('No has iniciado sesión.'); window.location.href = 'login.php';</script>";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Adopción</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <main class="bg-slate-200 mt-20 p-6">
        <!-- Banner -->
        <div class="relative bg-cover bg-center h-64" style="background-image: url('../images/banner_form_adop.webp');">
            <div class="absolute inset-0 bg-opacity-50 flex justify-center items-center">
                <h1 class="text-white text-4xl font-bold">Formulario de Adopción</h1>
            </div>
        </div>

        <section class="bg-gray-100">
            <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Imagen -->
                    <div class="lg:col-span-1">
                        <img src="../images/perros01.png" alt="Imagen" class="w-full h-full object-cover object-center rounded-lg shadow-lg">
                    </div>

                    <!-- Formulario -->
                    <div class="lg:col-span-1">
                        <div class="rounded-lg bg-white p-8 shadow-lg">
                            <h2 class="text-2xl font-bold mb-4">Solicitud de Adopción</h2>
                            <p class="text-lg text-gray-600 mb-8">Por favor, complete el siguiente formulario para solicitar la adopción de una mascota.</p>

                            <form action="../../backend/adopcion/procesar_adopcion.php" method="POST" class="space-y-4">
                                <input type="hidden" name="id_mascota " value="<?php echo htmlspecialchars($id_mascota); ?>">

                                <!-- Información del usuario -->
                                <div>
                                    <label for="nombre_usuario" class="block text-sm font-medium text-gray-700">Nombre:</label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                        id="nombre_usuario"
                                        name="nombre_usuario"
                                        value="<?php echo htmlspecialchars($usuario_data['nombre']); ?>"
                                        readonly
                                    />
                                </div>

                                <div>
                                    <label for="apellido_usuario" class="block text-sm font-medium text-gray-700">Apellido:</label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                        id="apellido_usuario"
                                        name="apellido_usuario"
                                        value="<?php echo htmlspecialchars($usuario_data['apellido']); ?>"
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
                                            value="<?php echo htmlspecialchars($usuario_data['email']); ?>"
                                            readonly
                                        />
                                    </div>

                                    <div>
                                        <label for="direccion_usuario" class="block text-sm font-medium text-gray-700">Dirección:</label>
                                        <input
                                            class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                            id="direccion_usuario"
                                            name="direccion_usuario"
                                            value="<?php echo htmlspecialchars($usuario_data['direccion']); ?>"
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
                                        value="<?php echo htmlspecialchars($usuario_data['num_telefono']); ?>"
                                        readonly
                                    />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<!-- Formulario de información adicional -->
<section class="bg-gray-100">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="rounded-lg bg-white p-8 shadow-lg">
      <h2 class="text-2xl font-bold mb-4">Información adicional</h2>
      <p class="text-lg text-gray-600 mb-8">Por favor, complete la siguiente información adicional.</p>

      <form action="../../backend/adopcion/procesar_adopcion.php" method="POST" class="space-y-4" id="adopcionForm">
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

  <!-- Incluir el footer -->
    <?php include 'footer.php'; ?>
    <script src="../js/main.js"></script>
  </body>
</html>
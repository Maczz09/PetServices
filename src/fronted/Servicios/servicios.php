<?php
include('../html/header.php');
session_start();
include('../../backend/config/Database.php');

// Crear la instancia de la base de datos y obtener la conexión
$db = new Database();
$conexion = $db->getConexion();

// Verificar si el usuario ha iniciado sesión
$usuarioLogeado = isset($_SESSION['idusuario']);

// Obtener los datos del usuario si ha iniciado sesión
if ($usuarioLogeado) {
  $idusuario = $_SESSION['idusuario'];
  $query = "SELECT nombre, apellido, email, direccion, num_telefono FROM usuarios WHERE idusuario = ?";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("i", $idusuario);
  $stmt->execute();
  $result = $stmt->get_result();
  $usuario = $result->fetch_assoc();
}

// Consultar los servicios desde la base de datos
$queryServicios = "SELECT * FROM servicios";
$resultServicios = $conexion->query($queryServicios);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios</title>
  <!-- Tailwind CSS Link -->
  <link href="../../output.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body>
  <!-- BANNER PRINCIPAL -->
  <section class="banner-section">
    <div class="banner mt-8">
      <?php
      // Array con las rutas de las imágenes
      $imagenes = array(
        "../images/bannergato1.jpg",
        "../images/bannerperro2.jpg",
        "../images/bannercon1.jpg"
      );

      // Mostrar las imágenes dentro del banner
      foreach ($imagenes as $imagen) {
        echo "<img src='$imagen' alt='Imagen del banner'>";
      }
      ?>
      <div class="banner-overlay">
        <h2 class="banner-title">Servicios</h2>
      </div>
    </div>
    <script src="../js/bannergirar.js"></script>
  </section>

  <!-- CONTENEDOR SERVICIOS -->
  <section class="services-container mx-auto px-4 my-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl">
      <?php while ($servicio = $resultServicios->fetch_assoc()) { ?>
        <div class="servicecard bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105"
          data-idservicio="<?php echo htmlspecialchars($servicio['idservicio']); ?>"
          data-service="<?php echo htmlspecialchars($servicio['nombre_servicio']); ?>">
          <img src="serv_images/<?php echo $servicio['imagen']; ?>" alt="<?php echo $servicio['nombre_servicio']; ?>" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800"><?php echo $servicio['nombre_servicio']; ?></h3>
            <div class="servicecard-info text-gray-600 text-sm mt-2">
              <p>Precio: $<?php echo $servicio['precio']; ?></p>
              <p>Categoría: <?php echo $servicio['categoria']; ?></p>
            </div>
          </div>
          <div class="p-4 pt-0">
            <button class="servicecard-button bg-red-500 text-white w-full py-2 rounded-md hover:bg-red-600 transition duration-300">
              Ver más
            </button>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>



  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div id="successModal">
      <div class="modal-content">
        <h3>¡Cita agendada con éxito! 🎉</h3>
        <p>Gracias por confiar en nuestros servicios. Nos pondremos en contacto contigo pronto.</p>
        <button id="closeModal">Aceptar</button>
      </div>
    </div>
  <?php endif; ?>

  <!-- Loader -->
  <div id="pageLoader" style="display: none;">
    <div class="spinner"></div>
  </div>


  <!-- Formulario de cita -->
  <div id="formularioCita" class="formservicio-hidden">
    <div class="formservicio-container">
      <h3 class="formservicio-titulo">Agendar Cita</h3>
      <?php if ($usuarioLogeado): ?>
        <form id="citaForm" action="guardar_servicio.php" method="post">
          <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario; ?>">
          <input type="hidden" id="idservicio" name="idservicio">
          <div class="formservicio-group">
            <label for="nombre">Servicio:</label>
            <input type="text" id="nombre" name="nombre_visible" readonly required>
          </div>
          <div class="formservicio-group">
            <label for="nombre_usuario">Nombre:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo htmlspecialchars($usuario['nombre'] ?? ''); ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="apellido_usuario">Apellido:</label>
            <input type="text" id="apellido_usuario" name="apellido_usuario" value="<?php echo htmlspecialchars($usuario['apellido'] ?? ''); ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion'] ?? ''); ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="email_usuario">Email:</label>
            <input type="email" id="email_usuario" name="email_usuario" value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="num_telefono">Número de teléfono:</label>
            <input type="tel" id="num_telefono" name="num_telefono" value="<?php echo htmlspecialchars($usuario['num_telefono'] ?? ''); ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="fecha_cita">Fecha:</label>
            <input type="date" id="fecha_cita" name="fecha_cita" required>
          </div>
          <div class="formservicio-group">
            <label for="hora_cita">Hora:</label>
            <input type="time" id="hora_cita" name="hora_cita" required>
          </div>
          <div class="formservicio-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
          </div>
          <button type="submit" class="formservicio-submit">Agendar</button>
        </form>
      <?php else: ?>
        <div class="alert alert-warning">
          Debe iniciar sesión para agendar un servicio. <a href="../authentication/login.php">Iniciar sesión</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Elementos del DOM
      const loader = document.getElementById('pageLoader');
      const citaForm = document.getElementById('citaForm');
      const botonesVerMas = document.querySelectorAll('.servicecard-button');
      const formularioContainer = document.getElementById('formularioCita');
      const idServicioInput = document.getElementById('idservicio');
      const nombreServicioInput = document.getElementById('nombre');
      const closeModalButton = document.getElementById('closeModal');

      // Manejar el evento de los botones "Ver más"
      botonesVerMas.forEach((boton) => {
        boton.addEventListener('click', function(e) {
          e.preventDefault();

          const serviceCard = this.closest('.servicecard');
          if (!serviceCard) return;

          const idServicio = serviceCard.dataset.idservicio;
          const nombreServicio = serviceCard.dataset.service;

          if (idServicio && nombreServicio) {
            idServicioInput.value = idServicio;
            nombreServicioInput.value = nombreServicio;
          }

          formularioContainer.classList.remove('formservicio-hidden');
          formularioContainer.classList.add('formservicio-visible');
        });
      });

      // Manejar el cierre del formulario al hacer clic fuera de él
      formularioContainer.addEventListener('click', function(e) {
        if (e.target === formularioContainer) {
          formularioContainer.classList.remove('formservicio-visible');
          formularioContainer.classList.add('formservicio-hidden');
        }
      });

      // Evitar que el clic dentro del formulario lo cierre
      document.querySelector('.formservicio-container').addEventListener('click', function(e) {
        e.stopPropagation();
      });

      // Manejar el evento submit del formulario
      if (citaForm) {
        citaForm.addEventListener('submit', function(e) {
          e.preventDefault(); // Evitar el comportamiento predeterminado del formulario

          // Mostrar el loader dinámicamente
          if (loader) {
            loader.style.display = 'flex';
          }

          // Simular un retraso antes de enviar el formulario
          setTimeout(() => {
            this.submit(); // Envía el formulario al servidor
          }, 1500);
        });
      }

      // Manejar el cierre del modal de éxito
      const closeModal = document.getElementById('closeModal');
      if (closeModal) {
        closeModal.addEventListener('click', function() {
          const successModal = document.getElementById('successModal');
          if (successModal) {
            successModal.style.display = 'none'; // Ocultar el modal al hacer clic en "Aceptar"
          }
        });
      }
    });
  </script>

  <?php include '../html/footer.php'; ?>
  <script src="../js/main.js"></script>
</body>

</html>
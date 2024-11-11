<?php 
include ('../html/header.php');
session_start();
include('../../backend/config/Database.php');

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
  <style>
    .formservicio-hidden {
      display: none;
    }
    .formservicio-visible {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }
  </style>
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
  <section class="services-container">
    <!-- Corte de Pelo -->
    <div class="servicecard" data-idservicio="1" data-service="Corte de Pelo">
      <img src="./serv_images/service1-icon.png" alt="Corte de Pelo" />
      <div class="servicecard-content">
        <h3>Corte de Pelo</h3>
        <div class="servicecard-info">
          <p>Precio: $20</p>
          <p>Categoría: Estética</p>
        </div>
      </div>
      <button class="servicecard-button button">Ver más</button>
    </div>

    <!-- Chequeo Médico -->
    <div class="servicecard" data-idservicio="2" data-service="Chequeo Médico">
      <img src="./serv_images/service2-icon.png" alt="Chequeo Médico" />
      <div class="servicecard-content">
        <h3>Chequeo Médico</h3>
        <div class="servicecard-info">
          <p>Precio: $40</p>
          <p>Categoría: Salud</p>
        </div>
      </div>
      <button class="servicecard-button button">Ver más</button>
    </div>

    <!-- Baño Medicado -->
    <div class="servicecard" data-idservicio="3" data-service="Baño Medicado">
      <img src="./serv_images/service3-icon.png" alt="Baño Medicado" />
      <div class="servicecard-content">
        <h3>Baño Medicado</h3>
        <div class="servicecard-info">
          <p>Precio: $35</p>
          <p>Categoría: Higiene y Salud</p>
        </div>
      </div> 
      <button class="servicecard-button button">Ver más</button>
    </div>

    <!-- Masajes -->
    <div class="servicecard" data-idservicio="4" data-service="Masajes">
      <img src="./serv_images/service4-icon.png" alt="Masajes" />
      <div class="servicecard-content">
        <h3>Masajes</h3>
        <div class="servicecard-info">
          <p>Precio: $25</p>
          <p>Categoría: Bienestar</p>
        </div>
      </div>
      <button class="servicecard-button button">Ver más</button>
    </div>
</section>

  <!-- Formulario de cita -->
<div id="formularioCita" class="formservicio-hidden">
  <div class="formservicio-container">
    <h3 class="formservicio-titulo">Agendar Cita</h3>
    <?php if ($usuarioLogeado): ?>
      <form id="citaForm" action="guardar_servicio.php" method="post">
        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $idusuario; ?>">
        <!-- Campo oculto para id del servicio -->
        <input type="hidden" id="idservicio" name="idservicio">

        <!-- Nombre del servicio visible pero no enviado -->
        <div class="formservicio-group">
          <label for="nombre">Servicio:</label>
          <input type="text" id="nombre" name="nombre_visible" readonly>
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
        <button type="submit" class="formservicio-submit">Agendar </button>
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
  const botonesVerMas = document.querySelectorAll('.servicecard-button');
  const formularioContainer = document.getElementById('formularioCita');
  const idServicioInput = document.getElementById('idservicio');  // Campo oculto para el idservicio
  const nombreServicioInput = document.getElementById('nombre');  // Campo visible para mostrar el nombre del servicio

  const usuarioLogeado = <?php echo json_encode($usuarioLogeado); ?>; // Variable PHP para verificar si está logueado

  botonesVerMas.forEach(boton => {
    boton.addEventListener('click', function(e) {
      e.preventDefault();
      if (usuarioLogeado) {
        // Obtener los atributos de servicio
        const nombreServicio = this.closest('.servicecard').getAttribute('data-service');
        const idServicio = this.closest('.servicecard').getAttribute('data-idservicio');

        // Mostrar el nombre del servicio en el campo visible
        nombreServicioInput.value = nombreServicio;

        // Asignar el id del servicio al campo oculto
        idServicioInput.value = idServicio;

        // Mostrar el formulario modal
        formularioContainer.classList.remove('formservicio-hidden');
        formularioContainer.classList.add('formservicio-visible');
      } else {
        // Mostrar mensaje de que se debe iniciar sesión
        alert("Debe iniciar sesión para agendar un servicio. Será redirigido a la página de inicio de sesión.");
        window.location.href = "../authentication/login.php"; // Redirige al login
      }
    });
  });

  // Cerrar el formulario al hacer clic fuera de él
  formularioContainer.addEventListener('click', function(e) {
    if (e.target === this) {
      this.classList.remove('formservicio-visible');
      this.classList.add('formservicio-hidden');
    }
  });

  // Evitar que el clic en el contenedor cierre el modal
  document.querySelector('.formservicio-container').addEventListener('click', function(e) {
    e.stopPropagation();
  });
});
</script>

  <!-- Incluir el footer -->
  <?php include '../html/footer.php'; ?>
  <script src="../js/main.js"></script>
</body>
</html>

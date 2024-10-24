<?php 
include 'header.php';
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

  <section class="services-container">
    <div class="servicecard" data-service="Corte de Pelo">
      <img src="../images/service1-icon.png" alt="Corte de Pelo" />
      <div class="servicecard-content">
        <h3>Corte de Pelo</h3>
        <div class="servicecard-info">
          <p>Precio: $20</p>
          <p>Categoría: Estética</p>
        </div>
      </div>
      <button class="servicecard-button button">Ver más</button>
    </div>

    <div class="servicecard" data-service="Chequeo Médico">
      <img src="../images/service2-icon.png" alt="Chequeo Médico" />
      <div class="servicecard-content">
        <h3>Chequeo Médico</h3>
        <div class="servicecard-info">
          <p>Precio: $40</p>
          <p>Categoría: Salud</p>
        </div>
      </div>
      <button class="servicecard-button button">Ver más</button>
    </div>

    <div class="servicecard" data-service="Baño Medicado">
      <img src="../images/service3-icon.png" alt="Baño Medicado" />
      <div class="servicecard-content">
        <h3>Baño Medicado</h3>
        <div class="servicecard-info">
          <p>Precio: $35</p>
          <p>Categoría: Higiene y Salud</p>
        </div>
      </div> <button class="servicecard-button button">Ver más</button>
    </div>

    <div class="servicecard" data-service="Masajes">
      <img src="../images/service4-icon.png" alt="Masajes" />
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
          <div class="formservicio-group">
            <label for="nombre">Servicio:</label>
            <input type="text" id="nombre" name="nombre" required>
          </div>
          <div class="formservicio-group">
            <label for="nombre_usuario">Nombre:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo $usuario['nombre']; ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="apellido_usuario">Apellido:</label>
            <input type="text" id="apellido_usuario" name="apellido_usuario" value="<?php echo $usuario['apellido']; ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="email_usuario">Email:</label>
            <input type="email" id="email_usuario" name="email_usuario" value="<?php echo $usuario['email']; ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="num_telefono">Número de teléfono:</label>
            <input type="tel" id="num_telefono" name="num_telefono" value="<?php echo $usuario['num_telefono']; ?>" readonly>
          </div>
          <div class="formservicio-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
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

  botonesVerMas.forEach(boton => {
    boton.addEventListener('click', function(e) {
      e.preventDefault();
      const nombreServicio = this.closest('.servicecard').getAttribute('data-service');
      formularioContainer.classList.remove('formservicio-hidden');
      formularioContainer.classList.add('formservicio-visible');
      if (document.getElementById('nombre')) {
        document.getElementById('nombre').value = nombreServicio;
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
});
  </script>

  <!-- Incluir el footer -->
  <?php include 'footer.php'; ?>
  <script src="../js/main.js"></script>
</body>
</html>
<?php
// Incluir la conexión a la base de datos
include('../../backend/config/Database.php');

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si se ha enviado el formulario y si el usuario ha iniciado sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['idusuario'])) {
    // Capturar los datos del formulario
    $idusuario = $_SESSION['idusuario'];
    $nombre = $_POST['nombre']; // Este es el nombre del servicio
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];

    // Verificar si la conexión a la base de datos es válida
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta con declaraciones preparadas para mayor seguridad
    $query_insert_servicio = "
        INSERT INTO agendarservicios
        (idusuario, nombre, fecha, descripcion)
        VALUES
        (?, ?, ?, ?)";

    // Preparar la declaración
    if ($stmt = $conexion->prepare($query_insert_servicio)) {
        // Vincular los parámetros
        $stmt->bind_param("isss", $idusuario, $nombre, $fecha, $descripcion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>alert('Servicio guardado con éxito.'); window.location.href = 'servicios.php';</script>";
        } else {
            echo "Error al guardar el servicio: " . $stmt->error . ". Inténtalo de nuevo.";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    // Si alguien intenta acceder al archivo directamente sin usar el formulario o sin iniciar sesión
    echo "<script>alert('Acceso denegado.'); window.location.href = 'servicios.php';</script>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
<?php
include('../../backend/config/Database.php');

// Crear instancia de la base de datos
$db = new Database();
$conexion = $db->getConexion();

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$idusuario = $_POST['idusuario'];
$idservicio = $_POST['idservicio'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$descripcion = $_POST['descripcion'];  // Variable del formulario

// Validar que todos los datos estén presentes
if (empty($idusuario) || empty($idservicio) || empty($fecha_cita) || empty($hora_cita) || empty($descripcion)) {
    die("Faltan datos obligatorios para agendar la cita.");
}

// Preparar la consulta para insertar los datos en la base de datos
$query = "INSERT INTO citas (idusuario, idservicio, fecha_cita, hora_cita, descripcion) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($query);

if ($stmt) {
    $stmt->bind_param("iisss", $idusuario, $idservicio, $fecha_cita, $hora_cita, $descripcion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: servicios.php?success=1"); // Redirige con el parámetro success=1
        exit();
    } else {
        header("Location: servicios.php?error=1"); // Redirige con un parámetro de error en caso de fallo
        exit();
    }
    
    // Cerrar la conexión
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conexion->error;
}

$conexion->close();
?>

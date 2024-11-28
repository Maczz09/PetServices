<?php
include('../../backend/config/Database.php');

try {
    // Crear instancia de la base de datos
    $db = new Database();
    $conexion = $db->getConexion(); // Obtener conexión del método del master

    // Obtener los datos del formulario
    $idusuario = $_POST['idusuario'] ?? null;
    $idservicio = $_POST['idservicio'] ?? null;
    $fecha_cita = $_POST['fecha_cita'] ?? null;
    $hora_cita = $_POST['hora_cita'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;

    // Validar que todos los datos estén presentes
    if (!$idusuario || !$idservicio || !$fecha_cita || !$hora_cita || !$descripcion) {
        header("Location: servicios.php?error=missing_data"); // Redirige en caso de datos faltantes
        exit();
    }

    // Preparar la consulta para insertar los datos
    $query = "INSERT INTO citas (idusuario, idservicio, fecha_cita, hora_cita, descripcion) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);

    if (!$stmt) {
        throw new Exception("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param("iisss", $idusuario, $idservicio, $fecha_cita, $hora_cita, $descripcion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirige con éxito
        header("Location: servicios.php?success=1");
        exit();
    } else {
        // Redirige con error si falla la ejecución
        header("Location: servicios.php?error=execution_failed");
        exit();
    }
} catch (Exception $e) {
    // Mostrar un mensaje de error en caso de excepciones no controladas
    echo "Ocurrió un error inesperado: " . $e->getMessage();
} finally {
    // Liberar recursos
    if (isset($stmt) && $stmt !== false) {
        $stmt->close();
    }
    if (isset($conexion) && $conexion !== false) {
        $conexion->close();
    }
}
?>


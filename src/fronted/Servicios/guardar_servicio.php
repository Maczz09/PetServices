<?php
include('../../backend/config/Database.php');

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

// Preparar la consulta para insertar los datos en la base de datos
$query = "INSERT INTO citas (idusuario, idservicio, fecha_cita, hora_cita, descripcion) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($query);
$stmt->bind_param("iisss", $idusuario, $idservicio, $fecha_cita, $hora_cita, $descripcion);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Cita agendada con éxito";
} else {
    echo "Error al agendar la cita: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>

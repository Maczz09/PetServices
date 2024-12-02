<?php
session_start(); // Iniciar la sesión

// Incluir archivo de conexión
include('../../backend/config/Database.php');

// Crear una instancia de la clase Database
$database = new Database();
$conexion = $database->getConexion(); // Obtener la conexión

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Recogemos los datos del formulario
  $id = (int)$_POST['id']; // Asegúrate de que el ID sea un entero
  $estado = mysqli_real_escape_string($conexion, $_POST['estado']); // Sanear el estado

  // Actualización de los datos en la base de datos
  $sql = "UPDATE solicitudes_adopcion SET estado_solicitud = '$estado' WHERE id = $id";

  if ($conexion->query($sql) === TRUE) {
    $_SESSION['success_message'] = "El estado de la solicitud se actualizó correctamente.";
    echo json_encode(['success' => true]);
  } else {
    $_SESSION['error_message'] = "Error al actualizar la solicitud: " . $conexion->error;
    echo json_encode(['success' => false, 'error' => $conexion->error]);
  }
  $conexion->close(); // Cerrar la conexión
  exit();
}
?>

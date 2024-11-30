<?php
// Incluye las configuraciones y la base de datos
include '../../backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

// Obtén los datos de la solicitud POST
$data = json_decode(file_get_contents("php://input"), true);

// Verifica que el ID del servicio esté presente
if (isset($data['idservicio'])) {
    $idservicio = $data['idservicio'];

    // Consulta para eliminar el servicio
    $query = "DELETE FROM servicios WHERE idservicio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idservicio);

    if ($stmt->execute()) {
        // Retorna una respuesta de éxito
        echo json_encode(['success' => true]);
    } else {
        // Retorna una respuesta de error
        echo json_encode(['success' => false]);
    }

    $stmt->close();
} else {
    // Si no se proporciona un ID de servicio, devuelve error
    echo json_encode(['success' => false, 'message' => 'ID del servicio no proporcionado']);
}

$conn->close();
?>

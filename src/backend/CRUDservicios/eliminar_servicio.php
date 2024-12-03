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

    // Verificar si hay citas asociadas a este servicio
    $queryCitas = "SELECT * FROM citas WHERE idservicio = ?";
    $stmtCitas = $conn->prepare($queryCitas);
    $stmtCitas->bind_param("i", $idservicio);
    $stmtCitas->execute();
    $resultCitas = $stmtCitas->get_result();

    // Si hay citas asociadas, no permitimos la eliminación
    if ($resultCitas->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Este servicio tiene citas asociadas y no se puede eliminar.']);
        exit;  // Detenemos la ejecución aquí
    }

    // Si no hay citas, eliminamos el servicio
    $query = "DELETE FROM servicios WHERE idservicio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idservicio);

    if ($stmt->execute()) {
        // Retorna una respuesta de éxito
        echo json_encode(['success' => true]);
    } else {
        // Retorna una respuesta de error
        echo json_encode(['success' => false, 'message' => 'No se pudo eliminar el servicio.']);
    }

    $stmt->close();
    $stmtCitas->close();
} else {
    // Si no se proporciona un ID de servicio, devuelve error
    echo json_encode(['success' => false, 'message' => 'ID del servicio no proporcionado']);
}

$conn->close();
?>

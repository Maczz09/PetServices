<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if (isset($_GET['idservicio'])) {
    $idservicio = $_GET['idservicio'];

    $query = "SELECT * FROM servicios WHERE idservicio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idservicio);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $servicio = $result->fetch_assoc();
        echo json_encode($servicio);
    } else {
        echo json_encode(["error" => "Servicio no encontrado."]);
    }
} else {
    echo json_encode(["error" => "ID de servicio no especificado."]);
}
?>

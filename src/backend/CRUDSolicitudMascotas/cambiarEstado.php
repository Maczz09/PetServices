<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $solicitudId = intval($_POST['id']);
    $nuevoEstado = $_POST['estado'];

    $database = new Database();
    $conexion = $database->getConexion();

    $sql = "UPDATE solicitudes_adopcion SET estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $nuevoEstado, $solicitudId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error al actualizar el estado.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Método no permitido.";
}
?>

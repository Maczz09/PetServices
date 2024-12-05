<?php
// Incluir la configuración de la base de datos
require_once __DIR__ . '/../config/Database.php';



try {
    // Capturar datos enviados por POST
    $idcita = $_POST['idcita'];
    $nuevoEstado = $_POST['estado'];

    if (!$idcita || !$nuevoEstado) {
        throw new Exception("Parámetros faltantes.");
    }

    // Conexión a la base de datos
    $db = new Database();
    $conn = $db->getConexion();

    // Actualizar el estado
    $stmt = $conn->prepare("UPDATE citas SET estado = ? WHERE idcita = ?");
    $stmt->bind_param("si", $nuevoEstado, $idcita);

    if ($stmt->execute()) {
        header('Location: ../../fronted/admin/AdminCitas.php');
        exit; // Redirige de vuelta al panel
    } else {
        throw new Exception("No se pudo actualizar el estado.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

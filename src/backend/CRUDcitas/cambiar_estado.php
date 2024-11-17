<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idcita = $_GET['idcita'];
    $nuevoEstado = $_GET['estado'];

    $sql = "UPDATE citas SET estado = ? WHERE idcita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nuevoEstado, $idcita);

    if ($stmt->execute()) {
        header('Location: http://localhost:3000/src/fronted/admin/AdminCitas.php?success=1');
    } else {
        echo "Error al cambiar el estado de la cita.";
    }
}
?>


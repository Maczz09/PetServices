<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idcita = $_POST['idcita']; 

    $sql = "DELETE FROM citas WHERE idcita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idcita);

    if ($stmt->execute()) {
        // Redirige de vuelta a AdminCitas.php con un mensaje de éxito
        header('Location: http://localhost:3000/src/fronted/admin/AdminCitas.php?success=1');
        exit; // Asegurate de terminar el script después de la redirección
    } else {
        echo "Error al eliminar la cita.";
    }
}
?>




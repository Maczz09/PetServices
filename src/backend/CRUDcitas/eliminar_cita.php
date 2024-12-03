<?php
include_once __DIR__ . '../../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar entrada
    $idcita = isset($_POST['idcita']) ? intval($_POST['idcita']) : null;

    if ($idcita) {
        $sql = "DELETE FROM citas WHERE idcita = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $idcita);

            if ($stmt->execute()) {
                // Redirige de vuelta a AdminCitas.php con un mensaje de éxito
                header('Location: http://localhost/src/fronted/admin/AdminCitas.php?success=1');
                exit; // Asegura que el script termine después de la redirección
            } else {
                echo "Error al eliminar la cita: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        echo "ID de cita inválido.";
    }
} else {
    echo "Método no permitido.";
}

$conn->close();
?>





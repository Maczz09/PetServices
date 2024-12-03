<?php
include_once __DIR__ . '../../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Validar entrada
    $idcita = isset($_GET['idcita']) ? intval($_GET['idcita']) : null;
    $nuevoEstado = isset($_GET['estado']) ? trim($_GET['estado']) : null;

    if ($idcita && $nuevoEstado) {
        $sql = "UPDATE citas SET estado = ? WHERE idcita = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $nuevoEstado, $idcita);

            if ($stmt->execute()) {
                header('Location: http://localhost/src/fronted/admin/AdminCitas.php?success=1');
                exit();
            } else {
                echo "Error al cambiar el estado de la cita.";
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        echo "Datos inválidos proporcionados.";
    }
} else {
    echo "Método no permitido.";
}

$conn->close();
?>



<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idservicio = $_POST['idservicio'];

    // Verificar si hay citas asociadas
    $sqlCheckCitas = "SELECT COUNT(*) AS total FROM citas WHERE idservicio = ?";
    $stmtCheckCitas = $conn->prepare($sqlCheckCitas);
    $stmtCheckCitas->bind_param("i", $idservicio);
    $stmtCheckCitas->execute();
    $result = $stmtCheckCitas->get_result();
    $row = $result->fetch_assoc();

    if ($row['total'] > 0) {
        // Redireccionar con error si hay citas asociadas, enviando el id del servicio
        header('Location: ../../fronted/admin/AdminServicios.php?error=citas_asociadas&idservicio=' . $idservicio);
        exit;
    }

    // Si no hay citas asociadas, procedemos a eliminar el servicio
    $sqlDeleteServicio = "DELETE FROM servicios WHERE idservicio = ?";
    $stmtDeleteServicio = $conn->prepare($sqlDeleteServicio);
    $stmtDeleteServicio->bind_param("i", $idservicio);

    if ($stmtDeleteServicio->execute()) {
        header('Location: ../../fronted/admin/AdminServicios.php?success=1');
        exit;
    } else {
        echo "Error al eliminar el servicio.";
    }
}
?>



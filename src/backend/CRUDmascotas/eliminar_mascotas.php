<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idmascota = $_POST['idmascota']; // Cambiamos a 'idmascota' para que sea consistente

    $sql = "DELETE FROM mascotas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idmascota);
    
    if ($stmt->execute()) {
        header('Location: /PetServices/src/fronted/admin/administradorMascotas.php?success=1'); // Redirigir a la página de administración de mascotas
    } else {
        echo "Error al eliminar la mascota.";
    }

    $stmt->close();
    $conn->close();
}
?>
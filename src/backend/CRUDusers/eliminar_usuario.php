<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusuario = $_POST['idusuario'];

    $sql = "DELETE FROM usuarios WHERE idusuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idusuario);
    
    if ($stmt->execute()) {
        header('Location: /PetServices/src/fronted/admin/administrarUsers.php?success=1');
    } else {
        echo "Error al eliminar el usuario.";
    }
}
?>

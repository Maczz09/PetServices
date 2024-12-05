<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idusuario = $_POST['idusuario'];

    // Eliminar las citas relacionadas
    $sql_citas = "DELETE FROM citas WHERE idusuario = ?";
    $stmt_citas = $conn->prepare($sql_citas);
    $stmt_citas->bind_param("i", $idusuario);

    if ($stmt_citas->execute()) {
        // Luego eliminar el usuario
        $sql = "DELETE FROM usuarios WHERE idusuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idusuario);

        if ($stmt->execute()) {
            header('Location: /PetServices/src/fronted/admin/administrarUsers.php?success=1');
        } else {
            echo "Error al eliminar el usuario.";
        }
    } else {
        echo "Error al eliminar las citas asociadas.";
    }
}
?>

<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_veterinario = $_POST['id_veterinario'];

    // Consulta para eliminar el veterinario de la tabla correcta
    $sql = "DELETE FROM veterinarios WHERE id_veterinario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_veterinario);

    if ($stmt->execute()) {
        // Redirigir a la página de administración con un mensaje de éxito
        header('Location: /PetServices/src/fronted/admin/administrarVeterinarios.php?success=1');
        exit();
    } else {
        echo "Error al eliminar el veterinario: " . $stmt->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $conn->close();
} else {
    echo "No se recibieron datos por POST.";
}
?>


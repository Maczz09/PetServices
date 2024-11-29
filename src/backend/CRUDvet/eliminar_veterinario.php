<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_veterinario'])) {
    $id_veterinario = intval($_POST['id_veterinario']);

    // Verificar que el ID no esté vacío o inválido
    if ($id_veterinario > 0) {
        // Ahora eliminar el veterinario y todos sus campos
        $query = "DELETE FROM veterinarios WHERE id_veterinario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_veterinario);

        if ($stmt->execute()) {
            // Redirigir con mensaje de éxito
            header("Location: /PetServices/src/fronted/vet_html/administrarVeterinarios.php?success=1");
        } else {
            echo "Error al eliminar el veterinario: " . $stmt->error; // Mostrar el error
        }

        $stmt->close();
    } else {
        echo "ID inválido.";
    }
} else {
    echo "Acceso no autorizado.";
}

$conn->close();
?>
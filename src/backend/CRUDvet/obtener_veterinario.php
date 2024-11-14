<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

$id_veterinario = $_GET['id'];

// Consulta para obtener los datos del veterinario por ID
$sql = "SELECT id_veterinario, Nombre, Apellido, direccion, Email, Telefono, fotoperfil, sede, biografia, idcategoriaespecialidad, curriculum_vitae FROM veterinarios WHERE id_veterinario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_veterinario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $veterinario = $result->fetch_assoc();
    echo json_encode($veterinario); // Enviar los datos como JSON
} else {
    echo json_encode(["error" => "Veterinario no encontrado."]);
}

$stmt->close();
$conn->close();
?>

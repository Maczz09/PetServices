<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

$idmascota = $_GET['id'];

// Consulta para obtener los datos de la mascota por ID
$sql = "SELECT id, nombre, edad, edad_meses, genero, tiene_enfermedad, enfermedad, foto, 
               historia, otros_detalles, tipo_mascota, actividad, peso, tamano 
        FROM mascotas 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idmascota);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $mascota = $result->fetch_assoc();
    echo json_encode($mascota); // Enviar los datos como JSON
} else {
    echo json_encode(["error" => "Mascota no encontrada."]);
}

$stmt->close();
$conn->close();
?>
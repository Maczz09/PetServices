<?php
// Asegúrate de que la ruta a Database.php sea correcta
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

// Consulta para obtener las mascotas
$sql = "SELECT * FROM mascotas";
$result = $conn->query($sql);

$mascotas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mascotas[] = $row;
    }
}
?>
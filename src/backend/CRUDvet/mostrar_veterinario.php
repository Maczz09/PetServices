<?php
// Asegúrate de que la ruta a Database.php sea correcta
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

// Consulta para obtener los veterinarios
$sql = "SELECT veterinarios.id_veterinario, veterinarios.Nombre, veterinarios.Apellido, veterinarios.Email, veterinarios.Telefono, veterinarios.direccion, veterinarios.fotoperfil, veterinarios.sede, veterinarios.biografia, veterinarios.idcategoriaespecialidad, veterinarios.curriculum_vitae
        FROM veterinarios";
$result = $conn->query($sql);

$veterinarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $veterinarios[] = $row;
    }
}
?>

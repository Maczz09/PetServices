<?php
// Asegúrate de que la ruta a Database.php sea correcta
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

// Consulta para obtener las especialidades
$sql = "SELECT especialidades.idcategoriaespecialidad, especialidades.nombre_especialidad, especialidades.descripcion
        FROM especialidades";
$result = $conn->query($sql);

$especialidades = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $especialidades[] = $row;
    }
}
?>
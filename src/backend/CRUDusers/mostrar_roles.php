<?php
// Incluye el archivo de conexión a la base de datos
include('../../backend/config/Database.php');

// Crear una instancia de la clase Database
$db = new Database();
$conn = $db->getConexion();

// Obtener los roles desde la base de datos
$sql = "SELECT idrol, nombre, descripcion FROM roles";
$result = $conn->query($sql);

// Verificar si hay resultados
$roles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $roles[] = $row;
    }
} else {
    echo "No se encontraron roles.";
}
$conn->close();

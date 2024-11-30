<?php
// Asegúrate de que la ruta a Database.php sea correcta
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

// Consulta para obtener los usuarios y roles
$sql = "SELECT usuarios.idusuario, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.num_telefono, usuarios.direccion, usuarios.email_verificado, roles.nombre AS rol
        FROM usuarios
        JOIN roles ON usuarios.idrol = roles.idrol";
$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}
?>

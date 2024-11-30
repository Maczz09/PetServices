<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

$idusuario = $_GET['id'];

// Consulta para obtener los datos del usuario por ID
$sql = "SELECT idusuario, nombre, apellido, email, num_telefono, direccion, idrol, email_verificado FROM usuarios WHERE idusuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idusuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    echo json_encode($usuario); // Enviar los datos como JSON
} else {
    echo json_encode(["error" => "Usuario no encontrado."]);
}

$stmt->close();
$conn->close();
?>

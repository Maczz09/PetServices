<?php
session_start(); // Asegúrate de que la sesión esté iniciada

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['idusuario'])) {
    die("Usuario no logeado");
}

// Obtener el ID del usuario logeado
$idusuario = $_SESSION['idusuario'];

// Modificar la consulta para obtener solo los datos del usuario logeado
$sql = "SELECT idusuario, nombre, apellido FROM usuarios WHERE idusuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idusuario);
$stmt->execute();
$result = $stmt->get_result();

$usuario = null;
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
}

$stmt->close();
$conn->close();

echo json_encode($usuario);
?>

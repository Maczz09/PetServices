<?php
session_start(); // Asegúrate de que la sesión esté iniciada

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices16";

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

$comentario = $_POST['comentario'];
$estrellas = $_POST['estrellas'];

// Usar consulta preparada para insertar el testimonio
$sql = "INSERT INTO testimonios (comentario, estrellas, usuario_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $comentario, $estrellas, $idusuario);

if ($stmt->execute() === TRUE) {
    echo "Testimonio insertado correctamente";
} else {
    echo "Error insertando testimonio: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

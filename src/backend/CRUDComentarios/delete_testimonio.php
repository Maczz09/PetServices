<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices16";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM testimonios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Testimonio eliminado correctamente.";
} else {
    echo "Error al eliminar el testimonio.";
}

$stmt->close();
$conn->close();
?>

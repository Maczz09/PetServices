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

// Consulta para obtener los testimonios junto con la información del usuario
$sql = "SELECT testimonios.comentario, testimonios.estrellas, usuarios.nombre, usuarios.apellido, testimonios.id
        FROM testimonios 
        JOIN usuarios ON testimonios.usuario_id = usuarios.idusuario";
$result = $conn->query($sql);

$testimonios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $testimonios[] = $row;
    }
} 

$conn->close();

echo json_encode($testimonios);
?>

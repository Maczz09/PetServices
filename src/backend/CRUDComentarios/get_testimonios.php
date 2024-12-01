<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT testimonios.comentario, testimonios.estrellas, usuarios.nombre, testimonios.id
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

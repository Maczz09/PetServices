<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT idusuario, nombre FROM usuarios";
$result = $conn->query($sql);

$usuarios = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
} 

$conn->close();

echo json_encode($usuarios);
?>

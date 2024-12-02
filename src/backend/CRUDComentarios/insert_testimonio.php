<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$comentario = $_POST['comentario'];
$estrellas = $_POST['estrellas'];
$usuario_id = $_POST['usuario_id'];

$sql = "INSERT INTO testimonios (comentario, estrellas, usuario_id) VALUES ('$comentario', $estrellas, $usuario_id)";

if ($conn->query($sql) === TRUE) {
    echo "Testimonio insertado correctamente";
} else {
    echo "Error insertando testimonio: " . $conn->error;
}

$conn->close();
?>

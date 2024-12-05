<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petservices16";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_POST['testimonio_id'];
$comentario = $_POST['comentario'];
$estrellas = $_POST['estrellas'];

$sql = "UPDATE testimonios SET comentario = ?, estrellas = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sii', $comentario, $estrellas, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $mensaje="<h1 style='text-align:center; color:blue'>Comentario actualizado correctamente.</h1>";
    include_once 'admin_testimonios.php';
}
// else {
//     $mensajeError="<h1 style='text-align:center; color:red'>Error al actualizar el testimonio.</h1>";
//     include_once 'admin_testimonios.php';
// }

$stmt->close();
$conn->close();
?>

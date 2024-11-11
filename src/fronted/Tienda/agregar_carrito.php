<?php
session_start();
require('../config/config.php');
require('../config/database.php');

$db = new Database();
$con = $db->conectar();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo "Sesión no iniciada. Redirigiendo...";
    header('Location: ../login.php');
    exit;
} else {
    echo "Usuario logueado: " . $_SESSION['id_usuario'];
}

$id_producto = $_GET['id'];
$id_usuario = $_SESSION['id_usuario'];

// Verificar si el producto ya está en el carrito
$query = $con->prepare("SELECT * FROM carrito WHERE id_producto = ? AND id_usuario = ?");
$query->execute([$id_producto, $id_usuario]);
$resultado = $query->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    // Si el producto ya está en el carrito, aumentar la cantidad
    $query = $con->prepare("UPDATE carrito SET cantidad = cantidad + 1 WHERE id_producto = ? AND id_usuario = ?");
    $query->execute([$id_producto, $id_usuario]);
} else {
    // Si el producto no está en el carrito, agregarlo
    $query = $con->prepare("INSERT INTO carrito (id_producto, id_usuario, cantidad) VALUES (?, ?, 1)");
    $query->execute([$id_producto, $id_usuario]);
}

// Ensure session is written to disk
session_write_close();
?>
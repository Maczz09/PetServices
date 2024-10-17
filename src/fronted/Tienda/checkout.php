<?php
session_start();
require('../config/config.php');
require('../config/database.php');

$db = new Database();
$con = $db->conectar();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../login.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Obtener productos del carrito
$query = $con->prepare("SELECT * FROM carrito WHERE id_usuario = ?");
$query->execute([$id_usuario]);
$productos_carrito = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($productos_carrito)) {
    echo "Tu carrito está vacío.";
    exit;
}

// Procesar compra (aquí puedes agregar el procesamiento del pago)
foreach ($productos_carrito as $item) {
    // Simulamos la eliminación de los productos del carrito tras la compra
    $query = $con->prepare("DELETE FROM carrito WHERE id_usuario = ?");
    $query->execute([$id_usuario]);
}

echo "Compra realizada con éxito.";
?>

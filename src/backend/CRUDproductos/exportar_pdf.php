<?php
session_start();
require '../vendor/autoload.php';
require '../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

$sql = "SELECT * FROM productos";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result(); // Obtener el resultado

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Encabezados de la tabla
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(60, 10, 'Descripción', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(20, 10, 'Descuento', 1);
$pdf->Ln();

// Datos de la tabla
while ($producto = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $producto['id_producto'], 1);
    $pdf->Cell(40, 10, $producto['nombre_producto'], 1);
    $pdf->Cell(60, 10, $producto['descripcion'], 1);
    $pdf->Cell(30, 10, $producto['precio'], 1);
    $pdf->Cell(20, 10, $producto['descuento'] . '%', 1);
    $pdf->Ln();
}

$pdf->Output();
exit;
<?php
require '../../config/database.php';
require '../../vendor/autoload.php';

$db = new Database();
$con = $db->conectar();

$sql = "SELECT * FROM productos";
$stmt = $con->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Table headers
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(60, 10, 'Descripción', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(20, 10, 'Descuento', 1);
$pdf->Ln();

// Table data
foreach ($productos as $producto) {
    $pdf->Cell(20, 10, $producto['id_producto'], 1);
    $pdf->Cell(40, 10, $producto['nombre_producto'], 1);
    $pdf->Cell(60, 10, $producto['descripcion'], 1);
    $pdf->Cell(30, 10, $producto['precio'], 1);
    $pdf->Cell(20, 10, $producto['descuento'] . '%', 1);
    $pdf->Ln();
}

$pdf->Output();
exit;

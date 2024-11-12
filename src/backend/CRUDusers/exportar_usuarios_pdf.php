<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/vendor/autoload.php';

use FPDF;

$db = new Database();
$con = $db->getConexion();

// Obtener los datos de usuarios
$sql = "SELECT idusuario, nombre, apellido, email, num_telefono, direccion, email_verificado FROM usuarios";
$stmt = $con->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Encabezados de tabla
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Nombre', 1);
$pdf->Cell(30, 10, 'Apellido', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Teléfono', 1);
$pdf->Cell(40, 10, 'Dirección', 1);
$pdf->Cell(20, 10, 'Verificado', 1);
$pdf->Ln();

// Agregar los datos
$pdf->SetFont('Arial', '', 10);
foreach ($usuarios as $usuario) {
    $pdf->Cell(10, 10, $usuario['idusuario'], 1);
    $pdf->Cell(30, 10, $usuario['nombre'], 1);
    $pdf->Cell(30, 10, $usuario['apellido'], 1);
    $pdf->Cell(50, 10, $usuario['email'], 1);
    $pdf->Cell(30, 10, $usuario['num_telefono'], 1);
    $pdf->Cell(40, 10, $usuario['direccion'], 1);
    $pdf->Cell(20, 10, $usuario['email_verificado'] ? 'Sí' : 'No', 1);
    $pdf->Ln();
}

// Configuración de salida del PDF
$pdf->Output('D', 'usuarios.pdf');
exit;
?>

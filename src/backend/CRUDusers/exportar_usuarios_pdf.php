<?php
require $_SERVER['DOCUMENT_ROOT'] . '/PetServices/config/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PetServices/vendor/autoload.php';

// Conexión a la base de datos
$db = new Database();
$con = $db->getConexion();

// Obtener los datos de los usuarios
$sql = "SELECT idusuario, nombre, apellido, email, num_telefono, direccion, email_verificado FROM usuarios";
$stmt = $con->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear el PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Encabezados de la tabla
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Apellido', 1);
$pdf->Cell(60, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Teléfono', 1);
$pdf->Cell(40, 10, 'Dirección', 1);
$pdf->Cell(20, 10, 'Verificado', 1);
$pdf->Ln(); // Nueva línea

// Datos de los usuarios
foreach ($usuarios as $usuario) {
    $pdf->Cell(20, 10, $usuario['idusuario'], 1);
    $pdf->Cell(40, 10, $usuario['nombre'], 1);
    $pdf->Cell(40, 10, $usuario['apellido'], 1);
    $pdf->Cell(60, 10, $usuario['email'], 1);
    $pdf->Cell(30, 10, $usuario['num_telefono'], 1);
    $pdf->Cell(40, 10, $usuario['direccion'], 1);
    $pdf->Cell(20, 10, $usuario['email_verificado'] ? 'Sí' : 'No', 1);
    $pdf->Ln(); // Nueva línea
}

// Salida del PDF
$pdf->Output();
exit;
?>

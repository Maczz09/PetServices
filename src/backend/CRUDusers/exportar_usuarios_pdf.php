<?php
require '../config/Database.php';
require '../vendor/autoload.php';

// Conexión a la base de datos
$db = new Database();
$con = $db->getConexion();

// Obtener los datos de los usuarios
$sql = "SELECT idusuario, nombre, apellido, email, num_telefono, direccion, email_verificado FROM usuarios";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$usuarios = [];
while ($usuario = $result->fetch_assoc()) {
    $usuarios[] = $usuario;
}

// Crear el PDF en orientación horizontal
$pdf = new FPDF('L', 'mm', 'A4'); // 'L' es para Landscape (Horizontal)
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

// Colores de fondo y texto para el encabezado
$pdf->SetFillColor(200, 200, 200);
$pdf->SetTextColor(0);

// Encabezados de la tabla
$pdf->Cell(20, 10, utf8_decode('ID'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Apellido'), 1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode('Email'), 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode('Dirección'), 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Verificado'), 1, 1, 'C', true); // Nueva línea

// Establecer colores para las filas alternas
$fill = false; // Alternar el color de fondo
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0);

foreach ($usuarios as $usuario) {
    $pdf->SetFillColor($fill ? 230 : 255, 230, 255); // Color alterno en las filas

    $pdf->Cell(20, 10, utf8_decode($usuario['idusuario']), 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, utf8_decode($usuario['nombre']), 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, utf8_decode($usuario['apellido']), 1, 0, 'C', $fill);
    $pdf->Cell(60, 10, utf8_decode($usuario['email']), 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, utf8_decode($usuario['num_telefono']), 1, 0, 'C', $fill);
    $pdf->Cell(60, 10, utf8_decode($usuario['direccion']), 1, 0, 'C', $fill);
    $pdf->Cell(20, 10, utf8_decode($usuario['email_verificado'] ? 'Sí' : 'No'), 1, 1, 'C', $fill); // Nueva línea

    $fill = !$fill; // Alternar color en cada fila
}

// Salida del PDF
$pdf->Output();
exit;
?>

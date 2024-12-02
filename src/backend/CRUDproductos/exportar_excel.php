<?php
// Asegúrate de que la ruta sea correcta
require '../../backend/config/Database.php'; // Cambia esto si es necesario
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$con = $db->getConexion(); // Cambié 'conectar()' a 'getConexion()'

$sql = "SELECT * FROM productos";
$stmt = $con->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $con->error);
}

$stmt->execute();
$result = $stmt->get_result(); // Obtener el resultado

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Establecer encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Descripción');
$sheet->setCellValue('D1', 'Precio');
$sheet->setCellValue('E1', 'Descuento');
$sheet->setCellValue('F1', 'Categoría');
$sheet->setCellValue('G1', 'Activo');

// Agregar datos
$row = 2;
while ($producto = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $producto['id_producto']);
    $sheet->setCellValue('B' . $row, $producto['nombre_producto']);
    $sheet->setCellValue('C' . $row, $producto['descripcion']);
    $sheet->setCellValue('D' . $row, $producto['precio']);
    $sheet->setCellValue('E' . $row, $producto['descuento']);
    $sheet->setCellValue('F' . $row, $producto['id_categoria']);
    $sheet->setCellValue('G' . $row, $producto['activo']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$fileName = 'productos.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
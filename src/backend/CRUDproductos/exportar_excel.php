<?php
require '../../config/database.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$con = $db->conectar();

$sql = "SELECT * FROM productos";
$stmt = $con->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set headers
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Descripción');
$sheet->setCellValue('D1', 'Precio');
$sheet->setCellValue('E1', 'Descuento');
$sheet->setCellValue('F1', 'Categoría');
$sheet->setCellValue('G1', 'Activo');

// Add data
$row = 2;
foreach ($productos as $producto) {
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

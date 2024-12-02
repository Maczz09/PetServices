<?php
require '../config/Database.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$con = $db->getConexion();

// Obtener los datos de usuarios, incluyendo idrol
$sql = "SELECT idusuario, idrol, nombre, apellido, email, num_telefono, direccion, email_verificado FROM usuarios";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$usuarios = $result->fetch_all(MYSQLI_ASSOC);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Usuarios');

// Encabezados de columnas
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'ID Rol');
$sheet->setCellValue('C1', 'Nombre');
$sheet->setCellValue('D1', 'Apellido');
$sheet->setCellValue('E1', 'Email');
$sheet->setCellValue('F1', 'Teléfono');
$sheet->setCellValue('G1', 'Dirección');
$sheet->setCellValue('H1', 'Email Verificado');

// Agregar los datos
$row = 2;
foreach ($usuarios as $usuario) {
    $sheet->setCellValue('A' . $row, $usuario['idusuario']);
    $sheet->setCellValue('B' . $row, $usuario['idrol']);
    $sheet->setCellValue('C' . $row, $usuario['nombre']);
    $sheet->setCellValue('D' . $row, $usuario['apellido']);
    $sheet->setCellValue('E' . $row, $usuario['email']);
    $sheet->setCellValue('F' . $row, $usuario['num_telefono']);
    $sheet->setCellValue('G' . $row, $usuario['direccion']);
    $sheet->setCellValue('H' . $row, $usuario['email_verificado'] ? 'Sí' : 'No');
    $row++;
}

// Configuración de encabezados para la descarga
$writer = new Xlsx($spreadsheet);
$fileName = 'usuarios.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;
?>

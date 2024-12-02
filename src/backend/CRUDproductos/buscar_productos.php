<?php
// Archivo: backend/CRUDproductos/buscar_productos.php
include('../config/Database.php');
header('Content-Type: application/json');

try {
    $database = new Database();
    $conexion = $database->getConexion();
    
    $term = isset($_GET['term']) ? $_GET['term'] : '';
    $term = $conexion->real_escape_string($term);
    
    $sql = "SELECT id_producto, nombre_producto, precio, imagen, descripcion 
            FROM productos 
            WHERE activo = 1 
            AND (nombre_producto LIKE '%$term%' OR descripcion LIKE '%$term%')
            LIMIT 5";
            
    $result = $conexion->query($sql);
    $productos = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }
    
    echo json_encode($productos);
    
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
<?php
include_once '../../backend/config/Database.php';

$database = new Database();
$conexion = $database->getConexion();

if (isset($_GET['id'])) {
    $solicitudId = intval($_GET['id']);
    $sql = "SELECT 
                solicitudes_adopcion.id AS solicitud_id,
                usuarios.nombre AS usuario_nombre,
                usuarios.apellido AS usuario_apellido,
                usuarios.email AS usuario_email,
                usuarios.direccion AS usuario_direccion,
                usuarios.num_telefono AS usuario_telefono,
                mascotas.nombre AS mascota_nombre,
                mascotas.tipo_mascota AS mascota_tipo,
                solicitudes_adopcion.estado_solicitud,
                solicitudes_adopcion.pregunta1,
                solicitudes_adopcion.pregunta2,
                solicitudes_adopcion.pregunta3,
                solicitudes_adopcion.pregunta4,
                solicitudes_adopcion.pregunta5,
                solicitudes_adopcion.pregunta6,
                solicitudes_adopcion.pregunta7,
                solicitudes_adopcion.pregunta8,
                solicitudes_adopcion.pregunta9,
                solicitudes_adopcion.pregunta10,
                solicitudes_adopcion.pregunta11,
                solicitudes_adopcion.pregunta12,
                solicitudes_adopcion.pregunta13,
                solicitudes_adopcion.pregunta14
            FROM 
                solicitudes_adopcion
            JOIN usuarios ON solicitudes_adopcion.idusuario = usuarios.idusuario
            JOIN mascotas ON solicitudes_adopcion.id_mascota = mascotas.id
            WHERE solicitudes_adopcion.id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $solicitudId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $solicitud = $result->fetch_assoc();
        echo json_encode($solicitud);
    } else {
        echo json_encode(['error' => 'Solicitud no encontrada']);
    }
} else {
    echo json_encode(['error' => 'ID de solicitud no proporcionado']);
}

$conexion->close();
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

// Verificar si se recibió el ID
if (!isset($_GET['id'])) {
    echo "No se proporcionó el ID de la solicitud.";
    exit;
}

$solicitudId = intval($_GET['id']);
$database = new Database();
$conexion = $database->getConexion();

// Consulta para obtener las preguntas
$sql = "SELECT * FROM solicitudes_adopcion WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $solicitudId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $solicitud = $result->fetch_assoc();

    // Renderizar HTML para el modal
    echo '<div class="space-y-4">';
    echo '<h2 class="text-lg font-bold text-gray-800">Detalles de la Solicitud</h2>';
    foreach ($solicitud as $pregunta => $respuesta) {
        echo '<div>';
        echo '<label class="block text-sm font-medium text-gray-700">' . htmlspecialchars($pregunta) . '</label>';
        echo '<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-100" value="' . htmlspecialchars($respuesta) . '" disabled>';
        echo '</div>';
    }
    echo '</div>';

    // Botones para cambiar estado
    echo '
        <div class="mt-4 flex gap-4">
            <button id="aprobar-solicitud" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Aprobar</button>
            <button id="denegar-solicitud" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Denegar</button>
        </div>
    ';
} else {
    echo "No se encontraron detalles para esta solicitud.";
}

$stmt->close();
$conexion->close();
?>

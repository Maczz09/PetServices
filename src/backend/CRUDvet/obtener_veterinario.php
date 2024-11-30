<?php
// Incluir el archivo de configuración de la base de datos
include('../../backend/config/Database.php');

// Crear una instancia de la conexión a la base de datos
$db = new Database();
$conn = $db->getConexion();

// Verificar si se ha proporcionado el ID del veterinario
if (isset($_GET['id_veterinario'])) {
    $id_veterinario = intval($_GET['id_veterinario']);

    // Consulta para obtener los datos del veterinario, incluyendo curriculum_vitae
    $sql = "SELECT * FROM veterinarios WHERE id_veterinario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_veterinario);
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $veterinario = $result->fetch_assoc();

        // Verificar y preparar la ruta de la imagen de perfil
        if (!empty($veterinario['fotoperfil'])) {
            $veterinario['fotoperfil'] = basename($veterinario['fotoperfil']); // Solo el nombre del archivo
        }

        // Devolver los datos del veterinario en formato JSON
        echo json_encode([
            "exists" => true,  // Indicar que el veterinario existe
            "data" => $veterinario
        ]);
    } else {
        echo json_encode([
            "exists" => false,
            "message" => "Veterinario no encontrado"
        ]);
    }

    $stmt->close();
} else {
    echo json_encode([
        "exists" => false,
        "message" => "ID del veterinario no proporcionado"
    ]);
}



// Cerrar la conexión
$conn->close();
?>

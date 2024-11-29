<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

// Validar y sanitizar la entrada
$idcategoriaespecialidad = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($idcategoriaespecialidad !== null) {
    // Consulta para obtener los datos de la especialidad por ID
    $sql = "SELECT idcategoriaespecialidad, nombre_especialidad, descripcion FROM especialidades WHERE idcategoriaespecialidad = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idcategoriaespecialidad);
        $stmt->execute();
        $result = $stmt->get_result();

        header('Content-Type: application/json'); // Establecer el encabezado de contenido

        if ($result->num_rows > 0) {
            $especialidad = $result->fetch_assoc();
            echo json_encode($especialidad); // Enviar los datos como JSON
        } else {
            echo json_encode(["error" => "Especialidad no encontrada."]);
        }

        $stmt->close();
    } else {
        // Manejo de error en la preparación de la consulta
        header('Content-Type: application/json');
        echo json_encode(["error" => "Error al preparar la consulta: " . $conn->error]);
    }
} else {
    // Manejo de error si el ID no es válido
    header('Content-Type: application/json');
    echo json_encode(["error" => "ID de especialidad no válido."]);
}

$conn->close();
?>

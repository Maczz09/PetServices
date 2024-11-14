<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $fotoperfil = $_POST['fotoperfil'] ?? '';
    $sede = $_POST['sede'] ?? '';
    $biografia = $_POST['biografia'] ?? '';
    $curriculum = $_POST['curriculum_vitae'] ?? '';
    $especialidad = $_POST['idcategoriaespecialidad'] ?? null;

    // Verificar si idcategoriaespecialidad es válido en caso de que tenga valor
    if ($especialidad) {
        $query_check = "SELECT COUNT(*) FROM vets_especialidades WHERE id_vetsEspecialidad = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("s", $especialidad);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count == 0) {
            die("Error: La especialidad especificada no existe en la base de datos.");
        }
    }

    // Preparar la sentencia SQL según si idcategoriaespecialidad está presente o no
    if ($especialidad) {
        $sql = "INSERT INTO veterinarios (nombre, apellido, email, telefono, direccion, fotoperfil, sede, biografia, idcategoriaespecialidad, curriculum_vitae)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Enlazar los parámetros incluyendo idcategoriaespecialidad
            $stmt->bind_param("ssssssssss", $nombre, $apellido, $email, $telefono, $direccion, $fotoperfil, $sede, $biografia, $especialidad, $curriculum);
        }
    } else {
        $sql = "INSERT INTO veterinarios (nombre, apellido, email, telefono, direccion, fotoperfil, sede, biografia, curriculum_vitae)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Enlazar los parámetros sin incluir idcategoriaespecialidad
            $stmt->bind_param("sssssssss", $nombre, $apellido, $email, $telefono, $direccion, $fotoperfil, $sede, $biografia, $curriculum);
        }
    }

    // Ejecutar la sentencia si la preparación fue exitosa
    if ($stmt) {
        if ($stmt->execute()) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>



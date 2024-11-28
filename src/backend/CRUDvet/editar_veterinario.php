<?php
include('../../backend/config/Database.php');

$db = new Database();
$conn = $db->getConexion();

// Respuesta en formato JSON
$response = [];

// Verificar si se ha proporcionado el ID del veterinario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_veterinario'])) {
    $id_veterinario = intval($_POST['id_veterinario']);

    // Obtener los datos del veterinario desde la base de datos
    $sql = "SELECT * FROM veterinarios WHERE id_veterinario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_veterinario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $veterinario = $result->fetch_assoc(); // Cargar los datos del veterinario
    } else {
        $response['success'] = false;
        $response['message'] = "Veterinario no encontrado";
        echo json_encode($response);
        exit;
    }
} else {
    $response['success'] = false;
    $response['message'] = "ID del veterinario no proporcionado";
    echo json_encode($response);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $sede = $_POST['sede'] ?? '';
    $biografia = $_POST['biografia'] ?? '';
    $curriculum_vitae = $_POST['curriculum_vitae'] ?? ''; // El link de OneDrive
    $especialidad = $_POST['idcategoriaespecialidad'] ?? null;

    // Verificar si la especialidad es válida
    if ($especialidad) {
        $query_check = "SELECT COUNT(*) FROM especialidades WHERE idcategoriaespecialidad = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("s", $especialidad);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count == 0) {
            $response['success'] = false;
            $response['message'] = "Error: La especialidad especificada no existe en la base de datos.";
            echo json_encode($response);
            exit;
        }
    }

    // Subir la foto de perfil (si se proporciona una nueva)
    $fotoperfil = $veterinario['fotoperfil']; // Mantener la foto actual
    if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == 0) {
        // Definir el directorio de destino
        $directorio_destino = '../../uploads_vets/';
        $archivo = $_FILES['fotoperfil']['name'];
        $ext = pathinfo($archivo, PATHINFO_EXTENSION);

        // Validar la extensión del archivo
        if (strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg') {
            // Validar el tamaño del archivo (por ejemplo, 2MB)
            if ($_FILES['fotoperfil']['size'] <= 2 * 1024 * 1024) {
                // Generar un nombre único para evitar conflictos
                $fotoperfil = uniqid('foto_', true) . '.' . $ext;
                $ruta_destino = $directorio_destino . $fotoperfil;

                // Mover el archivo a la carpeta de destino
                if (!move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $ruta_destino)) {
                    $response['success'] = false;
                    $response['message'] = "Error al subir la imagen.";
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response['success'] = false;
                $response['message'] = "El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.";
                echo json_encode($response);
                exit;
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Solo se permiten imágenes JPG o JPEG.";
            echo json_encode($response);
            exit;
        }
    }

    // Preparar la sentencia SQL para actualizar los datos del veterinario
    $sql = "UPDATE veterinarios SET nombre = ?, apellido = ?, email = ?, telefono = ?, direccion = ?, fotoperfil = ?, sede = ?, biografia = ?, idcategoriaespecialidad = ?, curriculum_vitae = ? WHERE id_veterinario = ?";
    $stmt = $conn->prepare($sql);
    if ($especialidad) {
        $stmt->bind_param("ssssssssssi", $nombre, $apellido, $email, $telefono, $direccion, $fotoperfil, $sede, $biografia, $especialidad, $curriculum_vitae, $id_veterinario);
    } else {
        $stmt->bind_param("sssssssssi", $nombre, $apellido, $email, $telefono, $direccion, $fotoperfil, $sede, $biografia, $curriculum_vitae, $id_veterinario);
    }

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'El veterinario se actualizó con éxito.';
        echo json_encode($response);
    } else {
        $response['success'] = false;
        $response['message'] = 'Error al actualizar el veterinario: ' . $stmt->error;
        echo json_encode($response);
    }

    $stmt->close();
}

$conn->close();
?>




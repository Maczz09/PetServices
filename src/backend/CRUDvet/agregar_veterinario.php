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
    $sede = $_POST['sede'] ?? '';
    $biografia = $_POST['biografia'] ?? '';
    $curriculum = $_POST['curriculum_vitae'] ?? ''; // Aquí se espera el enlace de OneDrive
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
            die("Error: La especialidad especificada no existe en la base de datos.");
        }
    }

    // Subir la foto de perfil
    $fotoperfil = '';
    if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == 0) {
        // Definir el directorio de destino
        $directorio_destino = '../../uploads_vets/';  // Asegúrate de tener este directorio creado
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
                if (move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $ruta_destino)) {
                    // La foto se cargó correctamente
                } else {
                    echo "Error al subir la imagen.";
                    exit;
                }
            } else {
                echo "El archivo es demasiado grande. El tamaño máximo permitido es 2 MB.";
                exit;
            }
        } else {
            echo "Solo se permiten imágenes JPG o JPEG.";
            exit;
        }
    }

    // Preparar la sentencia SQL según si idcategoriaespecialidad está presente o no
    if ($especialidad) {
        $sql = "INSERT INTO veterinarios (nombre, apellido, email, telefono, direccion, fotoperfil, sede, biografia, idcategoriaespecialidad, curriculum_vitae)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Enlazar los parámetros incluyendo idcategoriaespecialidad y el enlace de curriculum_vitae
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
            // Imprimir un mensaje de éxito y retroceder a la página anterior
            echo "<script>
                    alert('El veterinario se agregó con éxito.');
                    history.back(); // Retroceder a la página anterior
                  </script>";
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

<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idmascota = $_POST['idmascota'];
    $nombre = $_POST['nombre'];
    $edad = (int)$_POST['edad'];
    $edad_meses = (int)$_POST['edad_meses'];
    $genero = $_POST['genero'];
    $tiene_enfermedad = $_POST['tiene_enfermedad'];
    $enfermedad = $_POST['enfermedad'] ?? null;
    $historia = $_POST['historia'];
    $otros_detalles = $_POST['otros_detalles'] ?? '';
    $tipo_mascota = $_POST['tipo_mascota'];
    $actividad = $_POST['actividad'];
    $peso = $_POST['peso'];
    $tamano = $_POST['tamano'];

    // Verificar si el nombre de la mascota ya existe en la base de datos para otra mascota
    $check_sql = "SELECT * FROM mascotas WHERE nombre=? AND id != ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param('si', $nombre, $idmascota);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Si ya existe una mascota con ese nombre
        echo "<script>
                alert('El nombre de la mascota ya está en uso.');
                window.location.href='/PetServices/src/fronted/admin/administradorMascotas.php';
              </script>";
    } else {
        // Manejo de la imagen
        $ruta_foto = null;
        if ($_FILES['foto']['name']) {
            $foto = $_FILES['foto']['name'];
            $directorio_subida = $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/fronted/adopcion_html/uploads/';

            // Verifica si la carpeta 'uploads/' existe, si no, la crea
            if (!is_dir($directorio_subida)) {
                mkdir($directorio_subida, 0777, true); // Crea la carpeta con permisos
            }

            $ruta_foto = $directorio_subida . basename($foto);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto)) {
                echo "Imagen subida correctamente.<br>";
            } else {
                echo "Error al subir la imagen.<br>";
                $ruta_foto = null; // No se subió ninguna imagen
            }
        }

        // Actualización de los datos de la mascota
        if ($ruta_foto) {
            // Si se proporcionó una nueva foto
            $sql = "UPDATE mascotas 
                    SET nombre=?, edad=?, edad_meses=?, genero=?, tiene_enfermedad=?, enfermedad=?, foto=?, historia=?, otros_detalles=?, tipo_mascota=?, actividad=?, peso=?, tamano=? 
                    WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('siisssssssisi', $nombre, $edad, $edad_meses, $genero, $tiene_enfermedad, $enfermedad, $ruta_foto, $historia, $otros_detalles, $tipo_mascota, $actividad, $peso, $tamano, $idmascota);
        } else {
            // Sin cambiar la foto
            $sql = "UPDATE mascotas 
                    SET nombre=?, edad=?, edad_meses=?, genero=?, tiene_enfermedad=?, enfermedad=?, historia=?, otros_detalles=?, tipo_mascota=?, actividad=?, peso=?, tamano=? 
                    WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('siissssssssi', $nombre, $edad, $edad_meses, $genero, $tiene_enfermedad, $enfermedad, $historia, $otros_detalles, $tipo_mascota, $actividad, $peso, $tamano, $idmascota);
        }

        if ($stmt->execute()) {
            echo "<script>
                    alert('Mascota actualizada correctamente.');
                    window.location.href='/PetServices/src/fronted/admin/administradorMascotas.php';
                  </script>";
        } else {
            echo "Error al actualizar la mascota: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "No se recibieron datos por POST.";
}
?>
<?php
session_start(); // Iniciar la sesión

// Incluir archivo de conexión
include('../../backend/config/Database.php');

// Crear una instancia de la clase Database
$database = new Database();
$conexion = $database->getConexion(); // Obtener la conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos los datos del formulario
    $id = (int)$_POST['id']; // Asegúrate de que el ID sea un entero
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $edad = (int)$_POST['edad'];
    $edad_meses = (int)$_POST['edad_meses'];
    $genero = mysqli_real_escape_string($conexion, $_POST['genero']);
    $tiene_enfermedad = mysqli_real_escape_string($conexion, $_POST['tiene_enfermedad']);
    $enfermedad = mysqli_real_escape_string($conexion, $_POST['enfermedad'] ?? null);
    $historia = mysqli_real_escape_string($conexion, $_POST['historia']);
    $otros_detalles = mysqli_real_escape_string($conexion, $_POST['otros_detalles'] ?? ''); // Verifica si el campo existe, si no, lo deja vacío
    $tipo_mascota = mysqli_real_escape_string($conexion, $_POST['tipo_mascota']);
    $actividad = mysqli_real_escape_string($conexion, $_POST['actividad']);
    $peso = mysqli_real_escape_string($conexion, $_POST['peso']);
    $tamano = mysqli_real_escape_string($conexion, $_POST['tamano']);

    // Manejo de la imagen
    $foto = $_FILES['foto']['name'];
    $ruta_foto = null; // Inicializar la variable de ruta de foto

    if ($foto) {
        $directorio_subida = $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/fronted/adopcion_html/uploads/';

        // Verifica si la carpeta 'uploads/' existe, si no, la crea
        if (!is_dir($directorio_subida)) {
            mkdir($directorio_subida, 0777, true); // Crea la carpeta con permisos
        }

        $ruta_foto = 'uploads/' . basename($foto); // Cambia aquí para que sea relativa
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $directorio_subida . basename($foto))) {
            // Imagen subida correctamente
        } else {
            // Error al subir la imagen
            $ruta_foto = null; // No se subió ninguna imagen
        }
    }

    // Actualización de los datos en la base de datos
    $sql = "UPDATE mascotas SET 
                nombre = '$nombre', 
                edad = $edad, 
                edad_meses = $edad_meses, 
                genero = '$genero', 
                tiene_enfermedad = '$tiene_enfermedad', 
                enfermedad = '$enfermedad', 
                historia = '$historia', 
                otros_detalles = '$otros_detalles', 
                tipo_mascota = '$tipo_mascota', 
                actividad = '$actividad', 
                peso = '$peso', 
                tamano = '$tamano'";

    // Solo actualiza la foto si se ha subido una nueva
    if ($ruta_foto) {
        $sql .= ", foto = '$ruta_foto'";
    }

    $sql .= " WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        $_SESSION['success_message'] = "La mascota se actualizó correctamente.";
    } else {
        $_SESSION['error_message'] = "Error al actualizar la mascota: " . $conexion->error;
    }

    $conexion->close();

    // Redirigir a la página del administrador
    header('Location: /PetServices/src/fronted/admin/administradorMascotas.php');
    exit();
}
?>
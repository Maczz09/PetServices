<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir archivo de conexión
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/backend/config/Data';

    // Crear una instancia de la clase Database
    $database = new Database();
    $conexion = $database->getConexion(); // Obtener la conexión

    // Recogemos los datos del formulario
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
if ($foto) {
    $directorio_subida = $_SERVER['DOCUMENT_ROOT'] . '/PetServices/src/fronted/adopcion_html/uploads/';

    // Verifica si la carpeta 'uploads/' existe, si no, la crea
    if (!is_dir($directorio_subida)) {
        mkdir($directorio_subida, 0777, true); // Crea la carpeta con permisos
    }

    $ruta_foto = 'uploads/' . basename($foto); // Cambia aquí para que sea relativa
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $directorio_subida . basename($foto))) {
        echo "Imagen subida correctamente.<br>";
    } else {
        echo "Error al subir la imagen.<br>";
        $ruta_foto = null; // No se subió ninguna imagen
    }
} else {
    $ruta_foto = null; // No se subió ninguna imagen
}

    // Inserción de los datos en la base de datos
    $sql = "INSERT INTO mascotas (nombre, edad, edad_meses, genero, tiene_enfermedad, enfermedad, foto, historia, otros_detalles, tipo_mascota, actividad, peso, tamano) 
            VALUES ('$nombre', $edad, $edad_meses, '$genero', '$tiene_enfermedad', '$enfermedad', '$ruta_foto', '$historia', '$otros_detalles', '$tipo_mascota', '$actividad', '$peso', '$tamano')";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('Mascota subida con éxito.');
                window.location.href='/PetServices/src/fronted/admin/administradorMascotas.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
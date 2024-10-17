<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir archivo de conexión
    include('../../backend/config/Database.php');

    // Recogemos los datos del formulario
    $nombre = $_POST['nombre'];
    $edad_anos = $_POST['edad_anos'];
    $edad_meses = $_POST['edad_meses'];
    $genero = $_POST['genero'];
    $tiene_enfermedad = $_POST['tiene_enfermedad'];
    $enfermedad = $_POST['enfermedad'] ?? null;
    $historia = $_POST['historia'];
    $otros_detalles = $_POST['otros_detalles'] ?? ''; // Verifica si el campo existe, si no, lo deja vacío
    $tipo_mascota = $_POST['tipo_mascota'];
    $actividad = $_POST['actividad'];
    $peso = $_POST['peso'];
    $tamano = $_POST['tamano'];

    // Manejo de la imagen
    $foto = $_FILES['foto']['name'];
    if ($foto) {
        $directorio_subida = 'uploads/';

        // Verifica si la carpeta 'uploads/' existe, si no, la crea
        if (!is_dir($directorio_subida)) {
            mkdir($directorio_subida, 0777, true); // Crea la carpeta con permisos
        }

        $ruta_foto = $directorio_subida . basename($foto);
        
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto)) {
            echo "Imagen subida correctamente.<br>";
        } else {
            echo "Error al subir la imagen.<br>";
            $ruta_foto = null;
        }
    } else {
        $ruta_foto = null; // No se subió ninguna imagen
    }


    // Inserción de los datos en la base de datos
    $sql = "INSERT INTO mascotas (nombre, edad, edad_meses, genero, tiene_enfermedad, enfermedad, foto, historia, otros_detalles, tipo_mascota, actividad, peso, tamano) 
            VALUES ('$nombre', $edad_anos, $edad_meses, '$genero', '$tiene_enfermedad', '$enfermedad', '$ruta_foto', '$historia', '$otros_detalles', '$tipo_mascota', '$actividad', '$peso', '$tamano')";

    if ($conexion->query($sql) === TRUE) {
        echo "Mascota subida con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>

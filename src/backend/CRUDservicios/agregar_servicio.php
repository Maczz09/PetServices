<?php
include_once __DIR__ . '/../../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $conn = $db->getConexion();

    $nombre = $_POST['nombre_servicio'];
    $descripcion = $_POST['descripcion_servicio'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Manejo de la imagen
    if (isset($_FILES['imagen_servicio']) && $_FILES['imagen_servicio']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = basename($_FILES['imagen_servicio']['name']);
        
        // Ruta absoluta desde el directorio raíz del proyecto
        $carpetaDestino = __DIR__ . '/../../fronted/Servicios/serv_images/';
        $rutaDestino = $carpetaDestino . $nombreImagen;

        // Verificar si la carpeta 'serv_images' existe, y crearla si no
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true); // Crea la carpeta si no existe
        }

        // Mover la imagen desde el directorio temporal a la carpeta destino
        if (move_uploaded_file($_FILES['imagen_servicio']['tmp_name'], $rutaDestino)) {
            // Insertar el servicio y la ruta de la imagen en la base de datos
            $query = "INSERT INTO servicios (nombre_servicio, descripcion_servicio, precio, categoria, imagen) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $categoria, $nombreImagen);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir a la página de administración con un parámetro de éxito
                header("Location: ../../fronted/admin/AdminServicios.php?success=1");
                exit();
            } else {
                // Si la consulta falla
                echo "Error al guardar el servicio.";
            }
        } else {
            // Error al mover la imagen
            echo "Error al subir la imagen.";
        }
    } else {
        // Error en la imagen del servicio
        echo "Error en la imagen del servicio.";
    }
}




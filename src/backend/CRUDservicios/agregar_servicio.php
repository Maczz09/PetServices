<?php
include_once __DIR__ . '/../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $conn = $db->getConexion();

    $nombre = $_POST['nombre_servicio'];
    $descripcion = $_POST['descripcion_servicio'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Manejo de la imagen
    if (isset($_FILES['imagen_servicio']) && $_FILES['imagen_servicio']['error'] === UPLOAD_ERR_OK) {
        $imgNombre = basename($_FILES['imagen_servicio']['name']);
        $imgRuta = 'D:/Xammp/htdocs/PetServices/src/fronted/Servicios/serv_images/' . $imgNombre;


        // Mueve la imagen a la carpeta "serv_images"
        if (move_uploaded_file($_FILES['imagen_servicio']['tmp_name'], $imgRuta)) {
            // Inserta el servicio y la ruta de la imagen en la base de datos
            $query = "INSERT INTO servicios (nombre_servicio, descripcion_servicio, precio, categoria, imagen) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $categoria, $imgNombre);

            if ($stmt->execute()) {
                header("Location: ../../fronted/admin/AdminServicios.php?success=1");
                exit;
            } else {
                echo "Error al guardar el servicio.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error en la imagen del servicio.";
    }
}
?>




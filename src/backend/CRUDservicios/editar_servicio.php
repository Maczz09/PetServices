<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if (isset($_GET['idservicio']) || isset($_POST['idservicio'])) {
    $idservicio = isset($_GET['idservicio']) ? $_GET['idservicio'] : $_POST['idservicio'];

    $query = "SELECT * FROM servicios WHERE idservicio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idservicio);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $servicio = $result->fetch_assoc();
    } else {
        echo "Servicio no encontrado.";
        exit;
    }
} else {
    echo "ID de servicio no especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_servicio = $_POST['nombre_servicio'];
    $descripcion_servicio = $_POST['descripcion_servicio'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Ruta absoluta de la carpeta donde se guardan las imágenes
    $imgCarpeta = 'D:/GitCOPY/PetServices/src/fronted/Servicios/serv_images/';

    if (isset($_FILES['imagen_servicio']) && $_FILES['imagen_servicio']['error'] === UPLOAD_ERR_OK) {
        $imgNombre = basename($_FILES['imagen_servicio']['name']);
        $imgRuta = $imgCarpeta . $imgNombre;

        // Validar que el directorio exista
        if (!is_dir($imgCarpeta)) {
            echo "El directorio de destino no existe: " . $imgCarpeta;
            exit;
        }

        // Mover la imagen al directorio
        if (!move_uploaded_file($_FILES['imagen_servicio']['tmp_name'], $imgRuta)) {
            echo "Error al mover el archivo a la carpeta de destino.";
            exit;
        }

        $updateQuery = "UPDATE servicios SET nombre_servicio = ?, descripcion_servicio = ?, precio = ?, categoria = ?, imagen = ? WHERE idservicio = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssdssi", $nombre_servicio, $descripcion_servicio, $precio, $categoria, $imgNombre, $idservicio);
    } else {
        $updateQuery = "UPDATE servicios SET nombre_servicio = ?, descripcion_servicio = ?, precio = ?, categoria = ? WHERE idservicio = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssdsi", $nombre_servicio, $descripcion_servicio, $precio, $categoria, $idservicio);
    }

    if ($stmt->execute()) {
        header('Location: http://localhost:3000/src/fronted/admin/AdminServicios.php?success=1');
        exit;
    } else {
        echo "Error al actualizar el servicio.";
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
        /* Asegura la visualización del modal y el fondo */
        #editServiceModal {
            display: flex !important;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-100">

    <!-- Modal de Edición del Servicio -->
    <div id="editServiceModal"> <!-- Quitar cualquier clase hidden aquí -->
        <div class="modal-content">
            <h2 class="text-2xl font-semibold text-center mb-4">Editar Servicio</h2>
            
            <form action="editar_servicio.php?idservicio=<?php echo $idservicio; ?>" method="POST" enctype="multipart/form-data" class="w-full">
                <!-- Campo oculto para el ID del servicio -->
                <input type="hidden" name="idservicio" value="<?php echo $idservicio; ?>">
                
                <!-- Campos de Información del Servicio -->
                <div class="mb-4">
                    <label for="nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre del Servicio</label>
                    <input type="text" id="nombre_servicio" name="nombre_servicio" value="<?php echo htmlspecialchars($servicio['nombre_servicio']); ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                
                <div class="mb-4">
                    <label for="descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion_servicio" name="descripcion_servicio" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?php echo htmlspecialchars($servicio['descripcion_servicio']); ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" step="0.01" id="precio" name="precio" value="<?php echo htmlspecialchars($servicio['precio']); ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                
                <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($servicio['categoria']); ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                
                <!-- Campo para Cargar una Nueva Imagen -->
                <div class="mb-4">
                    <label for="imagen_servicio" class="block text-sm font-medium text-gray-700">Imagen del Servicio (opcional)</label>
                    <input type="file" id="imagen_servicio" name="imagen_servicio" class="mt-1 p-2 border border-gray-300 rounded-md w-full" style="display: block;">
                    <p class="text-sm text-gray-500 mt-1">Imagen actual: <?php echo htmlspecialchars($servicio['imagen']); ?></p>
                </div>
                
                <!-- Botones de Guardar y Cancelar -->
                <div class="flex justify-between mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
                    <a href="AdminServicios.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para abrir el modal de edición de servicio -->
    <script>
        function openEditServiceModal() {
            document.getElementById('editServiceModal').classList.remove('hidden');
        }
    </script>

</body>
</html>





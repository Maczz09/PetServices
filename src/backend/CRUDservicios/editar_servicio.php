<?php
include_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConexion();

if (isset($_GET['idservicio']) || isset($_POST['idservicio'])) {
    $idservicio = isset($_GET['idservicio']) ? $_GET['idservicio'] : $_POST['idservicio'];

    // Consultar los datos del servicio
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

    // Ruta absoluta para la carpeta donde se guardan las imágenes
    $imgCarpeta = __DIR__ . '/../../../fronted/Servicios/serv_images/';

    // Inicializar variable de nombre de imagen
    $imgNombre = $servicio['imagen'];  // Por defecto, mantener la imagen actual
    $imgCarpeta = __DIR__ . '/petservices/src/fronted/Servicios/serv_images/';  // Cambié la ruta a una absoluta
    $imgRuta = $imgCarpeta . basename($_FILES['imagen_servicio']['name']);

    // Si se sube una nueva imagen, procesar la imagen
    if (isset($_FILES['imagen_servicio']) && $_FILES['imagen_servicio']['error'] === UPLOAD_ERR_OK) {
        $imgNombre = basename($_FILES['imagen_servicio']['name']);
        $imgRuta = $imgCarpeta . $imgNombre;

        // Validar que el directorio exista
        if (!is_dir($imgCarpeta)) {
            mkdir($imgCarpeta, 0777, true); // Crear la carpeta si no existe
        }

        // Mover la imagen al directorio
        if (!move_uploaded_file($_FILES['imagen_servicio']['tmp_name'], $imgRuta)) {
            echo "Error al mover el archivo a la carpeta de destino.";
            exit;
        }
    }

    // Actualizar el servicio con la nueva imagen o la imagen existente
    $updateQuery = "UPDATE servicios SET nombre_servicio = ?, descripcion_servicio = ?, precio = ?, categoria = ?, imagen = ? WHERE idservicio = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssdssi", $nombre_servicio, $descripcion_servicio, $precio, $categoria, $imgNombre, $idservicio);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header('Location: ../../fronted/admin/AdminServicios.php?success=1');
        header('Location: /petservices/src/fronted/admin/AdminServicios.php?success=1');
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

    <!-- Modal para Editar Servicio -->
<div id="editServiceModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">Editar Servicio</h2>
        <!-- Formulario para editar servicio -->
        <form id="editServiceForm" action="../../backend/CRUDservicios/editar_servicio.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto para almacenar el ID del servicio -->
            <input type="hidden" id="edit_idservicio" name="idservicio">

            <!-- Campo: Nombre del Servicio -->
            <div class="mb-4">
                <label for="edit_nombre_servicio" class="block text-sm font-medium text-gray-700">Nombre del Servicio</label>
                <input type="text" id="edit_nombre_servicio" name="nombre_servicio" 
                       required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Campo: Descripción del Servicio -->
            <div class="mb-4">
                <label for="edit_descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="edit_descripcion_servicio" name="descripcion_servicio" 
                          required class="mt-1 p-2 border border-gray-300 rounded-md w-full"></textarea>
            </div>

            <!-- Campo: Precio -->
            <div class="mb-4">
                <label for="edit_precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" step="0.01" id="edit_precio" name="precio" 
                       required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Campo: Categoría -->
            <div class="mb-4">
                <label for="edit_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <input type="text" id="edit_categoria" name="categoria" 
                       required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Imagen del Servicio -->
            <div class="mb-4">
                <label for="edit_imagen_servicio" class="block text-sm font-medium text-gray-700">Imagen del Servicio</label>
                
                <!-- Previsualización de la Imagen Actual -->
                <img id="editImagePreview" src="" alt="Imagen del servicio" 
                     class="w-32 h-auto mb-2 hidden"> <!-- Esta imagen será visible solo si hay imagen cargada -->
                
                <!-- Input para cargar nueva imagen -->
                <input type="file" id="edit_imagen_servicio" name="imagen_servicio" 
                       accept="image/*" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeEditServiceModal()">Cancelar</button>
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
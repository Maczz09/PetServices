<?php
// Incluir el archivo de conexión y el header
include '../../backend/config/admin_session.php';
include('../../backend/config/Database.php');
include('../../backend/vendor/autoload.php');



// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$con = $database->getConexion();

// Obtener Categorías
$sql_categories = $con->prepare("SELECT id_categoria, nombre_categoria FROM categorias");
$sql_categories->execute();
$categorias = $sql_categories->get_result()->fetch_all(MYSQLI_ASSOC);

// Crear Producto
if (isset($_POST['create'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    // Manejo de la subida de la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $directorio_imagenes = '../images/productos/';
    move_uploaded_file($imagen_temp, $directorio_imagenes . $imagen);

    $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, imagen, id_categoria, activo, descuento) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssdsisi", $nombre, $descripcion, $precio, $imagen, $categoria, $activo, $descuento);
    $stmt->execute();
}

// Actualizar Producto
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    // Manejo de la subida de la imagen
    if ($_FILES['imagen']['name'] != "") {
        $imagen = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $directorio_imagenes = 'images/productos/';
        move_uploaded_file($imagen_temp, $directorio_imagenes . $imagen);

        $sql = "UPDATE productos SET nombre_producto = ?, descripcion = ?, precio = ?, imagen = ?, id_categoria = ?, activo = ?, descuento = ? WHERE id_producto = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssdsisii", $nombre, $descripcion, $precio, $imagen, $categoria, $activo, $descuento, $id);
        $stmt->execute();
    } else {
        $sql = "UPDATE productos SET nombre_producto = ?, descripcion = ?, precio = ?, id_categoria = ?, activo = ?, descuento = ? WHERE id_producto = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssdsiis", $nombre, $descripcion, $precio, $categoria, $activo, $descuento, $id);
        $stmt->execute();
    }
}

// Eliminar Producto
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Optionally, redirect or provide feedback after deletion
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
        exit;
    } else {
        echo "Error al eliminar el producto: " . $stmt->error;
    }
}

// Leer Productos
if (isset($_GET['buscar'])) {
    $buscar = "%" . strtolower($_GET['buscar']) . "%";
    $sql_products = $con->prepare("SELECT * FROM productos WHERE LOWER(nombre_producto) LIKE LOWER(?)");
    $sql_products->bind_param("s", $buscar);
} else {
    $sql_products = $con->prepare("SELECT * FROM productos");
}
$sql_products->execute();
$resultado = $sql_products->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel ="shortcut icon" type="image" href="./image/logoAdmin.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../images/perro.png">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="min-h-screen flex flex-col bg-white">
<div class="d-flex">
    <!-- Sidebar -->
        <?php include 'dashboard_sidebar.php'; ?>

    <!-- Contenido principal -->
    <div class="flex-1 md:ml-64 p-6"> 

    <div class="flex items-center justify-start bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de Administrar Productos</h1>
        </div>        
        <!-- Contenedor para los botones y la barra de búsqueda -->
        <div class="d-flex justify-content-between gap-3 mb-4">
            <!-- Botones -->
            <div class="d-flex gap-3 ms-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Producto</button>
                <a href="../../backend/CRUDproductos/exportar_excel.php" class="btn btn-success">Descargar Excel</a>
                <a href="../../backend/CRUDproductos/exportar_pdf.php" class="btn btn-danger" target="_blank">Descargar PDF</a>
            </div>

            <!-- Barra de búsqueda -->
            <form id="buscarForm" action="" method="GET">
                <input type="text" id="buscar" name="buscar" placeholder="Buscar productos..." class="form-control" style="width: 300px;">
            </form>
        </div>
        
        <!-- Tabla de productos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio Original</th>
                    <th>Descuento (%)</th>
                    <th>Precio con Descuento</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Activo</th>        
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $row): 
                    $precioFinal = $row['precio'] - ($row['precio'] * ($row['descuento'] / 100)); ?>
                <tr>
                    <td><?php echo $row['id_producto']; ?></td>
                    <td><?php echo $row['nombre_producto']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo number_format($row['precio'], 2); ?></td>
                    <td><?php echo $row['descuento']; ?>%</td>
                    <td><span class="text-success"><?php echo number_format($precioFinal, 2); ?></span></td>
                    <td><img src="images/productos/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" width="50" height="50"></td>
                    <td>
                        <?php foreach ($categorias as $categoria): 
                            if ($categoria['id_categoria'] == $row['id_categoria']) {
                                echo $categoria['nombre_categoria'];
                                break;
                            }
                        endforeach; ?>
                    </td>
                    <td><?php echo $row['activo'] ? 'Sí' : 'No'; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick='fillEditModal(<?php echo json_encode($row); ?>)'>Editar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick='setDeleteId(<?php echo $row['id_producto']; ?>)'>Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


    <?php include '../../backend/CRUDproductos/modals.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../../backend/CRUDproductos/javaproductos.js"></script>
    <script>
function setDeleteId(id) {
    document.getElementById('delete-id').value = id; // Set the product ID to the hidden input
}
</script>
    

</body>
</html>
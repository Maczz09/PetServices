<?php
require('../../backend/config/config.php');
require('../../backend/config/database.php');
$db = new Database();
$con = $db->conectar();
require '../vendor/autoload.php'; // Ajusta la ruta si es necesario

// Obtener Categorías
$sql_categories = $con->prepare("SELECT id_categoria, nombre_categoria FROM categorias");
$sql_categories->execute();
$categorias = $sql_categories->fetchAll(PDO::FETCH_ASSOC);

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
    $directorio_imagenes = 'images/productos/';
    move_uploaded_file($imagen_temp, $directorio_imagenes . $imagen);

    $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, imagen, id_categoria, activo, descuento) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $precio, $imagen, $categoria, $activo, $descuento]);
}

// Actualizar Producto
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $activo = isset($_POST['activo']) && $_POST['activo'] == 'on' ? 1 : 0;

    // Manejo de la subida de la imagen
    if ($_FILES['imagen']['name'] != "") {
        $imagen = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $directorio_imagenes = 'images/productos/';
        move_uploaded_file($imagen_temp, $directorio_imagenes . $imagen);

        $sql = "UPDATE productos SET nombre_producto = ?, descripcion = ?, precio = ?, imagen = ?, id_categoria = ?, activo = ?, descuento = ? WHERE id_producto = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nombre, $descripcion, $precio, $imagen, $categoria, $activo, $descuento, $id]);
    } else {
        $sql = "UPDATE productos SET nombre_producto = ?, descripcion = ?, precio = ?, id_categoria = ?, activo = ?, descuento = ? WHERE id_producto = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nombre, $descripcion, $precio, $categoria, $activo, $descuento, $id]);
    }
}

// Eliminar Producto
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    header("Location: administradorProductos.php");
    exit;
}

// Leer Productos
if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql_products = $con->prepare("SELECT * FROM productos WHERE LOWER(nombre_producto) LIKE LOWER(:buscar)");
    $sql_products->bindParam(':buscar', $buscar);
} else {
    $sql_products = $con->prepare("SELECT * FROM productos");
}
$sql_products->execute();
$resultado = $sql_products->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="shortcut icon" type="image" href="./image/logoAdmin.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Header -->
    <?php include '../Administrador/administradorHeader.php'; ?>

    <div class="container mt-5">
    <h2 class="mb-4 text-center">Lista de Productos</h2>

    
  <!-- Contenedor para los botones y la barra de búsqueda -->
<div class="d-flex justify-content-between gap-3 mb-4">
    <!-- Contenedor para los botones -->
    <div class="d-flex gap-3">
        <!-- Botón para agregar producto -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Producto</button>

        <!-- Botón para descargar Excel -->
        <a href="CRUD/exportar_excel.php" class="btn btn-success">Descargar Excel</a>

        <!-- Botón para descargar PDF -->
        <a href="CRUD/exportar_pdf.php" class="btn btn-danger" target="_blank">Descargar PDF</a>

    </div>

        <!-- Barra de búsqueda de productos -->
    <form id="buscarForm" action="">
        <input type="text" id="buscar" name="buscar" placeholder="Buscar productos...">
    </form>

</div>
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
        <th>Acciones </th>
    </tr>
</thead>
            <tbody>
    <?php foreach ($resultado as $row) { 
        $precioFinal = $row['precio'] - ($row['precio'] * ($row['descuento'] / 100));
        
    ?>
    
    <tr>
    <td><?php echo $row['id_producto']; ?></td>
    <td><?php echo $row['nombre_producto']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>
    <td><?php echo number_format($row['precio'], 2); ?></td>
    <td><?php echo $row['descuento']; ?>%</td>
    <td><span class="text-success"><?php echo number_format($precioFinal, 2); ?></span></td>
    <td><img src="images/productos/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre_producto']; ?>" width="50" height="50"></td>
    <td><?php 
        foreach ($categorias as $categoria) {
            if ($categoria['id_categoria'] == $row['id_categoria']) {
                echo $categoria['nombre_categoria'];
                break;
            }
        }
    ?></td>
    <td><?php echo $row['activo'] ? 'Sí' : 'No'; ?></td>
    <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detalleModal" onclick='fillDetalleModal(<?php echo json_encode($row); ?>)'><i class="fas fa-eye"></i></button>
        </form>
    </td>
    <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick='fillEditModal(<?php echo json_encode($row); ?>)'>Editar</button>
        </form>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
            <button type="submit" class="btn btn-danger btn-sm" name="delete">Eliminar</button>
        </form>
    </td>
</tr>
    <?php } ?>
</tbody>
        </table>
    </div>
    <?php include 'CRUD/modals.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
    function fillEditModal(data) {
        document.querySelector('#edit-id').value = data.id_producto;
        document.querySelector('#edit-nombre').value = data.nombre_producto;
        document.querySelector('#edit-descripcion').value = data.descripcion;
        document.querySelector('#edit-precio').value = data.precio;
        document.querySelector('#edit-descuento').value = data.descuento;
        document.querySelector('#edit-categoria').value = data.id_categoria;
        document.querySelector('#edit-activo').checked = data.activo == 1;
    }

    function fillDeleteModal(id) {
    document.querySelector('#delete-id').value = id;
}
function fillDetalleModal(data) {
    const detalleModalBody = document.getElementById('detalle-modal-body');
    detalleModalBody.innerHTML = `
        <h2>${data.nombre_producto}</h2>
        <p>${data.descripcion}</p>
        <p>Precio: ${data.precio}</p>
        <p>Descuento: ${data.descuento}%</p>
        <img src="images/productos/${data.imagen}" alt="${data.nombre_producto}" width="100" height="100">
    `;
}
document.getElementById('buscar').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    const filas = document.querySelectorAll('table tbody tr');
    
    filas.forEach(function(fila) {
        const nombreProducto = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (nombreProducto.includes(query)) {
            fila.style.display = ''; // Mostrar la fila si coincide con la búsqueda
        } else {
            fila.style.display = 'none'; // Ocultar la fila si no coincide
        }
    });
});
</script>

</body>
</html>
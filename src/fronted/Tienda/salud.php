<?php
require ('../config/config.php');
require('../config/database.php');
$db = new Database();
$con = $db->conectar();

// Obtener ID de la categoría "Salud"
$sql_categoria = $con->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = 'Salud'");
$sql_categoria->execute();
$categoria_id = $sql_categoria->fetch(PDO::FETCH_ASSOC)['id_categoria'];

// Obtener productos activos
$sql_products = $con->prepare("SELECT * FROM productos WHERE id_categoria = '$categoria_id'");
$sql_products->execute();
$resultado = $sql_products->fetchAll(PDO::FETCH_ASSOC);

function obtenerImagenProducto($imagen) {
    // Verificamos si existe la imagen especificada o usamos una imagen predeterminada
    return file_exists("images/productos/" . $imagen) ? "images/productos/" . $imagen : "images/no-photo.jpg";
}

function calcularPrecioConDescuento($precio, $descuento) {
    return $precio - ($precio * ($descuento / 100));
}

include '../session.php'; 
include '../header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body>
   <!-- Sección de productos -->
<section id="seccion-producto" class="py-5">
    <div class="container">
        <h2 class="text-center text-3xl font-semibold mb-4">Productos</h2>
        <!-- Formulario de búsqueda -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <input type="text" name="buscar" placeholder="Buscar productos...">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
        <div class="row" id="lista-1">
            <?php 
                // Obtener ID de la categoría "Salud"
                $sql_categoria = $con->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = 'Salud'");
                $sql_categoria->execute();
                $categoria_id = $sql_categoria->fetch(PDO::FETCH_ASSOC)['id_categoria'];

                // Obtener productos activos
                if (isset($_GET['buscar'])) {
                    $buscar = $_GET['buscar'];
                    $sql_products = $con->prepare("SELECT * FROM productos WHERE id_categoria = '$categoria_id' AND nombre_producto LIKE '%$buscar%'");
                } else {
                    $sql_products = $con->prepare("SELECT * FROM productos WHERE id_categoria = '$categoria_id'");
                }
                $sql_products->execute();
                $resultado = $sql_products->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach($resultado as $row): 
                $precioConDescuento = calcularPrecioConDescuento($row['precio'], $row['descuento']);
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border border-gray-300 shadow-sm">
                        <?php
                            $imagen = obtenerImagenProducto($row['imagen']);
                        ?>
                        <img src="<?php echo $imagen; ?>" alt="Producto" class="card-img-top img-fluid" style="height: 250px; object-fit: contain; padding: 10px;">
                        <div class="card-body">
                            <h3 class="card-title text-lg font-bold"><?php echo $row['nombre_producto']; ?></h3>
                            <?php if($row['descuento'] > 0): ?>
                                <p class="card-text">
                                    <span class="text-muted text-decoration-line-through">S/<?php echo number_format($row['precio'], 2, '.', ','); ?></span>
                                    <span class="text-success font-semibold">S/<?php echo number_format($precioConDescuento, 2, '.', ','); ?></span>
                                </p>
                            <?php else: ?>
                                <p class="card-text text-success font-semibold">S/<?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="detalles.php?id=<?php echo $row['id_producto']; ?>&token=<?php echo hash_hmac('sha1', $row['id_producto'], KEY_TOKEN); ?>" class="btn btn-primary btn-sm">Detalles</a>
                            <a href="#" class="btn btn-success btn-sm agregar-carrito-btn" data-id="<?php echo $row['id_producto']; ?>">Agregar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
    
</body>
    <!-- Pie de página -->
    <?php include '../footer.php'; ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@ 2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="ocultar_mostrar.js"></script>
    <script src="main.js"></script>

</html>
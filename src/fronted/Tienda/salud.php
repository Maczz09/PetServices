<?php   
// Asegúrate de incluir el archivo de conexión a la base de datos
include('../../backend/config/Database.php');

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$conexion = $database->getConexion();

// Obtener ID de la categoría "Accesorios"
$sql_categoria = $conexion->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = ?");
$nombre_categoria = 'Salud';
$sql_categoria->bind_param("s", $nombre_categoria);
$sql_categoria->execute();
$result_categoria = $sql_categoria->get_result();
$categoria_id = $result_categoria->fetch_assoc()['id_categoria'];

// Obtener productos activos
$sql_products = $conexion->prepare("SELECT * FROM productos WHERE id_categoria = ?");
$sql_products->bind_param("i", $categoria_id);
$sql_products->execute();
$result_products = $sql_products->get_result();
$resultado = $result_products->fetch_all(MYSQLI_ASSOC);

function obtenerImagenProducto($imagen) {
    return file_exists("../images/productos/" . $imagen) ? "../images/productos/" . $imagen : "../images/no-photo.jpg";
}

function calcularPrecioConDescuento($precio, $descuento) {
    return $precio - ($precio * ($descuento / 100));
}

function mostrarModal($producto) {
    ?>
    <div class="modal fade" id="detallesModal<?php echo $producto['id_producto']; ?>" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detallesModalLabel"><?php echo $producto['nombre_producto']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo obtenerImagenProducto($producto['imagen']); ?>" alt="Producto" class="img-fluid">
                    <p>Precio: S/<?php echo number_format($producto['precio'], 2, '.', ','); ?></p>
                    <p>Descripción: <?php echo $producto['descripcion']; ?></p>
                    <!-- Agrega más detalles según sea necesario -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

include '../html/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body>
   <!-- Sección de productos -->
<section id="seccion-producto" class="py-5">
    <div class="container">
        <h2 class="text-center text-3xl font-semibold mb-4">Productos</h2>
        
        <div class="row" id="lista-1">
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
                            <?php if($row['descuento'] >  0): ?>
                                <p class="card-text">
                                    <span class="text-muted text-decoration-line-through">S/<?php echo number_format($row['precio'], 2, '.', ','); ?></span>
                                    <span class="text-success font-semibold">S/<?php echo number_format($precioConDescuento, 2, '.', ','); ?></span>
                                </p>
                            <?php else: ?>
                                <p class="card-text text-success font-semibold">S/<?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <!-- Botón para abrir modal de detalles -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detallesModal<?php echo $row['id_producto']; ?>">Detalles</button>
                            <a href="#" class="btn btn-success btn-sm agregar-carrito-btn" data-id="<?php echo $row['id_producto']; ?>">Agregar</a>
                        </div>
                    </div>
                </div>

                <?php mostrarModal($row); ?>

            <?php endforeach; ?>
        </div>
    </div>
</section>
    
</body>
    <?php include '../html/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</html>
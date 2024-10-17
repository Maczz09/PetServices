<?php
require('config/config.php');
require('config/database.php');

$db = new Database();
$con = $db->conectar();

// Definir la función obtenerImagenProducto
function obtenerImagenProducto($imagen) {
    return file_exists("images/productos/" . $imagen) ? "images/productos/" . $imagen : "images/no-photo.jpg";
}

// Definir la función calcularPrecioConDescuento
function calcularPrecioConDescuento($precio, $descuento) {
    return $precio - ($precio * ($descuento / 100));
}

// Obtener ID de la categoría "Alimento"
$sql_categoria = $con->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = 'Alimento'");
$sql_categoria->execute();
$categoria_id = $sql_categoria->fetch(PDO::FETCH_ASSOC)['id_categoria'];

// Obtener productos según el término de búsqueda
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

$sql_products = $con->prepare("SELECT * FROM productos WHERE id_categoria = ? AND nombre_producto LIKE ?");
$sql_products->execute([$categoria_id, '%' . $buscar . '%']);
$resultado = $sql_products->fetchAll(PDO::FETCH_ASSOC);

// Generar el HTML de los productos
foreach ($resultado as $row) {
    $precioConDescuento = calcularPrecioConDescuento($row['precio'], $row['descuento']);
    $imagen = obtenerImagenProducto($row['imagen']);
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 border border-gray-300 shadow-sm">
            <img src="<?php echo $imagen; ?>" alt="Producto" class="card-img-top img-fluid" style="height: 250px; object-fit: contain; padding: 10px;">
            <div class="card-body">
                <h3 class="card-title text-lg font-bold"><?php echo $row['nombre_producto']; ?></h3>
                <?php if ($row['descuento'] > 0): ?>
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
    <?php
}
?>

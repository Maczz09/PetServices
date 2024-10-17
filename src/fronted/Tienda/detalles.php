<?php
require ('../config/config.php');
require('../config/database.php'); // Verifica que la ruta sea correcta
$db = new Database();
$con = $db->conectar();

$id_producto = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';


// Validar ID y token
if ($id_producto == '' || $token == '') {
    echo 'Error al procesar la solicitud';
    exit;
}

$token_tmp = hash_hmac('sha1', $id_producto, KEY_TOKEN);
if ($token != $token_tmp) {
    echo 'Error al procesar la solicitud';
    exit;
}


// Consultar los detalles del producto
$sql = $con->prepare("SELECT nombre_producto, descripcion, precio, imagen, descuento FROM productos WHERE id_producto = ? AND activo = 1");
$sql->execute([$id_producto]);
$producto = $sql->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    echo 'Producto no encontrado';
    exit;
}

// Función para obtener la imagen del producto
function obtenerImagenProducto($imagen) {
    return file_exists("images/productos/" . $imagen) ? "images/productos/" . $imagen : "images/no-photo.jpg";
}

// Calcular el precio con descuento (si aplica)
$precio_original = $producto['precio'];
$descuento = $producto['descuento'];
$precio_final = $descuento > 0 ? $precio_original - ($precio_original * ($descuento / 100)) : $precio_original;
?>

<?php include '../session.php'; ?>
<?php include '../header.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
</head>

<body>

    <main class="container mt-5">
        <div class="row">
            <!-- Imagen del producto -->
            <div class="col-md-6">
                <img src="<?php echo obtenerImagenProducto($producto['imagen']); ?>" class="img-fluid" alt="Imagen del producto">
            </div>

            <!-- Detalles del producto -->
            <div class="col-md-6">
                <h1 class="text-3xl font-bold"><?php echo $producto['nombre_producto']; ?></h1>

                <!-- Mostrar el precio con o sin descuento -->
                <?php if ($descuento > 0): ?>
                    <p class="text-lg text-muted"><del>S/ <?php echo number_format($precio_original, 2, '.', ','); ?></del></p>
                    <p class="text-lg text-success font-semibold">S/ <?php echo number_format($precio_final, 2, '.', ','); ?> <span class="text-danger">(<?php echo $descuento; ?>% de descuento)</span></p>
                <?php else: ?>
                    <p class="text-lg text-success font-semibold">S/ <?php echo number_format($precio_original, 2, '.', ','); ?></p>
                <?php endif; ?>

                <!-- Descripción del producto -->
                <p class="text-md mt-4"><?php echo $producto['descripcion']; ?></p>

                <!-- Botón para agregar al carrito -->
                <div class="mt-4">
                    <a href="#" class="btn btn-success btn-sm agregar-carrito-btn" data-id="<?php echo $id_producto; ?>">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-700 flex flex-col sm:flex-row justify-around p-10 items-center relative">
        <?php include '../footer.php'; ?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</body>
</html>

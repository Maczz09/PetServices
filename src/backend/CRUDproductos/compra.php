<?php
session_start();

// Calcular total y obtener productos del carrito de sesión
$productos_carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total = array_reduce($productos_carrito, function($carry, $item) {
    return $carry + ($item['precio'] * $item['cantidad']);
}, 0);

// Generar número de orden único
$numero_orden = 'PET' . strtoupper(substr(uniqid(), -6));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Completar Compra - PetShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .payment-method {
            transition: all 0.3s ease;
        }
        .payment-method:hover {
            transform: scale(1.05);
        }
        .efectivo-method {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .yape-method {
            background-color: #cce5ff;
            border-color: #b8daff;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Detalles de la Compra</h2>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Número de Orden: <?php echo $numero_orden; ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Imagen</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos_carrito as $producto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                                <td>
                                    <img src="../../fronted/images/productos/<?php echo htmlspecialchars($producto['imagen']); ?>" 
                                         alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" 
                                         style="max-width: 50px; max-height: 50px;">
                                </td>
                                <td><?php echo $producto['cantidad']; ?></td>
                                <td>S/ <?php echo number_format($producto['precio'], 2); ?></td>
                                <td>S/ <?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                <td><strong>S/ <?php echo number_format($total, 2); ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="mb-4">Método de Pago</h2>
            <form id="formularioPago" method="POST" action="procesar_pago.php">
                <input type="hidden" name="numero_orden" value="<?php echo $numero_orden; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                
                <div class="card payment-method efectivo-method mb-3">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" id="efectivo" value="efectivo" required>
                            <label class="form-check-label" for="efectivo">
                                <strong>Pago en Efectivo</strong>
                            </label>
                        </div>
                        <small class="text-muted">Paga directamente en nuestro local</small>
                    </div>
                </div>

                <div class="card payment-method yape-method">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metodo_pago" id="yape" value="yape">
                            <label class="form-check-label" for="yape">
                                <strong>Pago con Yape</strong>
                            </label>
                        </div>
                        <div id="yapeQR" style="display:none;" class="text-center mt-2">
                            <img src="../../fronted/images/yape_qr.jpeg" alt="QR de Yape" class="img-fluid" style="max-width: 200px;">
                            <p class="text-muted mt-2">Escanea para realizar el pago</p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Realizar Pedido</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="metodo_pago"]');
    const yapeQR = document.getElementById('yapeQR');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            yapeQR.style.display = this.value === 'yape' ? 'block' : 'none';
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
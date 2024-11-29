<?php
// Verificar si se ha pasado el ID del pedido
if (!isset($_GET['orden'])) {
    header('Location: compra.php');
    exit();
}

// Obtener el ID del pedido de la URL
$pedido_id = htmlspecialchars($_GET['orden']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <div class="alert alert-success" role="alert">
        <h2>¡Pedido Realizado Exitosamente!</h2>
        <p>Su número de orden es: <strong><?php echo $pedido_id; ?></strong></p>
        <p>Gracias por su compra.</p>
        <a href="../../fronted/Tienda/petshop.php" class="btn btn-primary">Volver a la Tienda</a>
    </div>
</div>
</body>
</html>
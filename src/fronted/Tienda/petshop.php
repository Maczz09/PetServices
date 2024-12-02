<?php  
// Asegúrate de incluir el archivo de conexión a la base de datos
include('../../backend/config/Database.php');

// Crear instancia de la clase Database y obtener la conexión
$database = new Database();
$conexion = $database->getConexion();

// Obtener todos los productos activos
$sql_products = $conexion->prepare("SELECT * FROM productos WHERE activo = 1");
$sql_products->execute();
$result_products = $sql_products->get_result();
$resultado = $result_products->fetch_all(MYSQLI_ASSOC);

// Función para obtener la imagen del producto
function obtenerImagenProducto($imagen) {
    return file_exists("../images/productos/" . $imagen) ? "../images/productos/" . $imagen : "../images/no-photo.jpg";
}

// Función para calcular el precio con descuento
function calcularPrecioConDescuento($precio, $descuento) {
    return $precio - ($precio * ($descuento / 100));
}

// Función para mostrar el modal de detalles del producto
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
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <link href="pet.css" rel="stylesheet">
    
</head>

<body>
<section class="container-fluid">
    <header>
        <section class="relative w-full">
            <div class="w-full mt-16 h-72 bg -cover bg-center" style="background-image: url('../images/imagen-nosotros.webp');">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute inset-0 flex justify-center items-center">
                    <h1 class="text-white text-5xl md:text-7xl font-bold">PetShop</h1>
                </div>
            </div>
        </section>

        <!-- Barra de búsqueda y carrito -->
        <div class="search-cart-header d-flex justify-content-between align-items-center p-2 bg-light">
            <input type="text" id="search-bar" placeholder="Buscar productos..." class="form-control me-2">
            <button id="cart-button" class="btn btn-outline-secondary">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </div>
    </header>

    <!-- Menú del carrito -->
    <div id="cart-sidebar">
        <div class="p-4 cart-header d-flex justify-content-between align-items-center">
            <h2 class="m-0">Carrito de Compras</h2>
            <button id="close-cart" class="btn btn-danger btn-sm">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="cart-items" class="p-4">
            <p>No hay productos en el carrito.</p>
        </div>
        <div class="p-4 border-t">
            <a href="../../backend/CRUDproductos/compra.php" class="btn btn-primary w-100">Proceder al pago</a>
            <button id="clear-cart" class="btn btn-warning w-100 mt-2">
                <i class="fas fa-trash"></i> Limpiar Carrito
            </button>
        </div>
    </div>

    
</section>
<!-- Sección de productos -->
<section id="seccion-producto" class="py-5">
    <div class="container">
        <h2 class="text-center text-3xl font-semibold mb-4">Todos los Productos</h2>
        
        <div class="row" id="lista-1">
            <?php foreach($resultado as $row): 
                $precioConDescuento = calcularPrecioConDescuento($row['precio'], $row['descuento']);
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class ="card h-100 border border-gray-300 shadow-sm">
                        <?php $imagen = obtenerImagenProducto($row['imagen']); ?>
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
                            <!-- Botón para abrir modal de detalles -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detallesModal<?php echo $row['id_producto']; ?>">Detalles</button>
                            <form class="agregar-al-carrito-form" method="POST">
                                <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                                <input type="hidden" name="nombre_producto" value="<?php echo $row['nombre_producto']; ?>">
                                <input type="hidden" name="precio" value="<?php echo $precioConDescuento; ?>">
                                <input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php mostrarModal($row); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include '../html/footer.php'; ?>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https:// cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="ocultar_mostrar.js"></script>
    <script src="main.js"></script>
    <script>
    
    document.addEventListener('DOMContentLoaded', () => {
        const cartButton = document.getElementById('cart-button');
        const cartSidebar = document.getElementById('cart-sidebar');
        const closeCartButton = document.getElementById('close-cart');

        // Abrir el menú del carrito
        cartButton.addEventListener('click', () => {
            cartSidebar.classList.toggle('open');
            actualizarCarrito(); // Actualiza el carrito al abrir
        });

        // Cerrar el menú del carrito
        closeCartButton.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
        });
    });

    document.querySelectorAll('.agregar-al-carrito-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío predeterminado del formulario

       

        // Obtener la cantidad disponible
        const cantidadDisponible = parseInt(this.querySelector('input[name="cantidad_disponible"]').value);
        
        // Verificar si hay suficiente cantidad disponible
        if (cantidadDisponible <= 0) {
            alert('No hay suficiente cantidad disponible.');
            submitButton.disabled = false; // Habilitar el botón nuevamente
            return;
        }

        // Restar uno a la cantidad disponible
        this.querySelector('input[name="cantidad_disponible"]').value = cantidadDisponible - 1;

        let formData = new FormData(form);

        fetch('../../backend/CRUDproductos/agregar_carrito.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                actualizarCarrito(); // Actualiza el carrito después de agregar
            } else {
                alert('Error al agregar el producto: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error al agregar al carrito:', error);
            alert('Hubo un error al agregar el producto al carrito. Por favor, intenta de nuevo.');
        })
        .finally(() => {
            // Habilitar el botón nuevamente después de que se complete la solicitud
            submitButton.disabled = false;
        });
    });
});
    document.addEventListener('DOMContentLoaded', () => {
    // ... código existente ...

    // Agregar el evento para limpiar carrito
    const clearCartButton = document.getElementById('clear-cart');
    clearCartButton.addEventListener('click', () => {
        if (confirm('¿Estás seguro de que deseas limpiar el carrito?')) {
            fetch('../../backend/CRUDproductos/limpiar_carrito.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        actualizarCarrito();
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error al limpiar el carrito:', error);
                });
        }
    });

    // Mejorar el manejo de errores en la función de agregar al carrito
    document.querySelectorAll('.agregar-al-carrito-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            let formData = new FormData(form);

            fetch('../../backend/CRUDproductos/agregar_carrito.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    actualizarCarrito();
                } else {
                    alert('Error al agregar el producto: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error al agregar al carrito:', error);
                alert('Hubo un error al agregar el producto al carrito. Por favor, intenta de nuevo.');
            });
        });
    });
});
    function actualizarCarrito() {
    fetch('../../backend/CRUDproductos/get_carrito.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = ''; // Limpia los elementos actuales
            if (data.length > 0) {
                data.forEach(item => {
                    // Corregir ruta de imagen si está incompleta
                    const imagenCorregida = item.imagen.startsWith('images/') 
                        ? item.imagen 
                        : `../images/productos/${item.imagen}`;

                    cartItems.innerHTML += `
                        <div class="cart-item d-flex justify-content-between align-items-center">
                            <img src="${imagenCorregida}" alt="${item.nombre_producto}" class="img-thumbnail" width="50">
                            <p>${item.nombre_producto}</p>
                            <p>Cantidad: ${item.cantidad}</p>
                            <p>Precio: S/${item.precio}</p>
                            <button class="btn btn-danger btn-sm eliminar-item" data-id="${item.id_producto}">Eliminar</button>
                        </div>
                    `;
                });

                // Agregar evento de eliminación a los botones
                document.querySelectorAll('.eliminar-item').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const idProducto = this.getAttribute('data-id');
                        fetch('../../backend/CRUDproductos/eliminar_carrito.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `id_producto=${idProducto}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                actualizarCarrito(); // Actualiza el carrito después de eliminar
                            } else {
                                console.error(data.message);
                            }
                        })
                        .catch(error => console.error('Error al eliminar producto:', error));
                    });
                });
            } else {
                cartItems.innerHTML = '<p>No hay productos en el carrito.</p>';
            }
        })
        .catch(error => console.error('Error al obtener el carrito:', error));
}
// Función para la búsqueda en tiempo real
function initializeSearch() {
    const searchInput = document.getElementById('search-bar');
    const searchContainer = searchInput.parentElement;
    
    // Crear el contenedor de resultados si no existe
    let searchResults = document.querySelector('.search-results');
    if (!searchResults) {
        searchResults = document.createElement('div');
        searchResults.className = 'search-results';
        searchContainer.appendChild(searchResults);
    }

    // Debounce function para evitar demasiadas peticiones
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.trim();
        clearTimeout(searchTimeout);

        if (searchTerm.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`../../backend/CRUDproductos/buscar_productos.php?term=${encodeURIComponent(searchTerm)}`)
                .then(response => response.json())
                .then(productos => {
                    searchResults.innerHTML = '';
                    
                    if (productos.length > 0) {
                        productos.forEach(producto => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'search-result-item';
                            resultItem.innerHTML = `
                                <img src="${obtenerRutaImagen(producto.imagen)}" alt="${producto.nombre_producto}">
                                <div class="product-info">
                                    <div class="product-name">${producto.nombre_producto}</div>
                                    <div class="product-price">S/ ${formatPrice(producto.precio)}</div>
                                </div>
                            `;
                            
                            resultItem.addEventListener('click', () => {
                                // Abrir el modal del producto
                                const modal = new bootstrap.Modal(document.getElementById(`detallesModal${producto.id_producto}`));
                                modal.show();
                                searchResults.style.display = 'none';
                                searchInput.value = '';
                            });
                            
                            searchResults.appendChild(resultItem);
                        });
                        searchResults.style.display = 'block';
                    } else {
                        searchResults.innerHTML = '<div class="p-3">No se encontraron productos</div>';
                        searchResults.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error en la búsqueda:', error);
                    searchResults.style.display = 'none';
                });
        }, 300); // Esperar 300ms después de que el usuario deje de escribir
    });

    // Cerrar resultados cuando se hace clic fuera
    document.addEventListener('click', function(e) {
        if (!searchContainer.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });
}

// Funciones auxiliares
function obtenerRutaImagen(imagen) {
    return imagen.startsWith('images/') ? imagen : `../images/productos/${imagen}`;
}

function formatPrice(price) {
    return Number(price).toFixed(2);
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    initializeSearch();
    
    // Código existente del carrito...
});

    </script>

</html>
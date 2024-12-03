<?php
include('../../backend/config/Database.php');

// Crear la instancia de la base de datos y obtener la conexión
$db = new Database();
$conexion = $db->getConexion();

// Verificar si el usuario ha iniciado sesión
$usuarioLogeado = isset($_SESSION['idusuario']);

// Obtener los datos del usuario si ha iniciado sesión
if ($usuarioLogeado) {
    $idusuario = $_SESSION['idusuario'];

    // Usar consulta preparada para obtener los datos del usuario
    $query = "SELECT nombre, apellido FROM usuarios WHERE idusuario = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $idusuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
} else {
    // Redirigir al login si el usuario no ha iniciado sesión
    header("Location: ../authentication/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Ingresar Comentario</title>
</head>
<body>
    <div class="container mx-auto px-4 py-2">
        <div class="relative overflow-hidden w-full p-4">
            <span class="absolute top-1/2 transform -translate-y-1/2 text-2xl text-white cursor-pointer z-10 bg-black bg-opacity-50 p-2 rounded-full left-4" id="prev">&#10094;</span>
            <span class="absolute top-1/2 transform -translate-y-1/2 text-2xl text-white cursor-pointer z-10 bg-black bg-opacity-50 p-2 rounded-full right-2" id="next">&#10095;</span>
            <div class="flex transition-transform duration-500" id="testimonial-container">
                <!-- Los testimonios generados automáticamente se mostrarán aquí -->
            </div>
        </div>
        <?php if ($usuarioLogeado): ?>
            <button id="openModal" class="bg-blue-500 text-white p-2 rounded">Ingresar Comentario</button>
        <?php endif; ?>
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-4">Nuevo Comentario</h2>
            <form id="commentForm">
                <div class="mb-4">
                    <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
                    <textarea id="comentario" name="comentario" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="estrellas" class="block text-sm font-medium text-gray-700">Estrellas</label>
                    <select id="estrellas" name="estrellas" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm" required>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <p id="nombreCompleto" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm"><?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?></p>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal" class="bg-red-500 text-white p-2 rounded mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de éxito -->
    <!-- <div id="successModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
            <h2 class="text-2xl font-bold text-green-600 mb-4">¡Comentario Agregado!</h2>
            <p class="text-gray-700 mb-4">El comentario ha sido agregado exitosamente.</p>
            <button class="bg-green-500 text-white p-2 rounded hover:bg-green-700 transition duration-300" onclick="closeSuccessModal()">Aceptar</button>
        </div>
    </div> -->

    <script src="../js/script_testimonios.js"></script>
        <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.add('hidden');
            document.getElementById('comentario').value = ''; // Limpiar el textarea de comentario
        });

        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const submitButton = document.querySelector('#commentForm button[type="submit"]');
            submitButton.disabled = true;
            
            const formData = new FormData(event.target);
            formData.append('nombre', '<?php echo htmlspecialchars($usuario['nombre']); ?>');
            formData.append('apellido', '<?php echo htmlspecialchars($usuario['apellido']); ?>');
            fetch('../../backend/CRUDComentarios/insert_testimonio.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                fetchTestimonios(); // Refresca los testimonios después de agregar uno nuevo
                document.getElementById('comentario').value = ''; // Limpiar el textarea de comentario
                document.getElementById('myModal').classList.add('hidden');
                submitButton.disabled = false; // Volver a habilitar el botón
            })
            .catch(error => {
                console.error('Error al insertar testimonio:', error);
                submitButton.disabled = false;
            });
        });

        let currentIndex = 0;

        function fetchTestimonios() {
            fetch('../../backend/CRUDComentarios/get_testimonios.php')
                .then(response => response.json())
                .then(data => {
                    const testimonialContainer = document.getElementById('testimonial-container');
                    testimonialContainer.innerHTML = '';
                    data.forEach(testimonio => {
                        const nuevoTestimonio = document.createElement('div');
                        nuevoTestimonio.classList.add('min-w-full', 'p-8', 'bg-white', 'rounded-lg', 'shadow-lg', 'flex', 'flex-col', 'items-center', 'testimonial-slide');
                        nuevoTestimonio.innerHTML = `
                            <p class="text-2xl font-medium text-gray-700 mb-4 text-center">${testimonio.comentario}</p>
                            <div class="flex items-center mb-4">
                                <img src="../images/nosotros/avatar.png" alt="Testimonial" class="rounded-full w-16 h-16 mr-4">
                                <div>
                                    <p class="font-medium text-gray-900">${testimonio.nombre} ${testimonio.apellido}</p>
                                    <p class="text-gray-500">Cliente</p>
                                    <div class="text-yellow-500">
                                        ${'★'.repeat(testimonio.estrellas)}${'☆'.repeat(5 - testimonio.estrellas)}
                                    </div>
                                </div>
                            </div>
                        `;
                        testimonialContainer.appendChild(nuevoTestimonio);
                    });
                    initCarousel();
                })
                .catch(error => console.error('Error al obtener testimonios:', error));
        }

        function initCarousel() {
            const container = document.getElementById('testimonial-container');
            const slides = document.querySelectorAll('.testimonial-slide');
            const totalSlides = slides.length;

            // Reset the index
            currentIndex = 0;
            container.style.transform = `translateX(0)`;

            // Move to the next slide every 5 seconds
            setInterval(() => {
                if (totalSlides > 1) {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    container.style.transform = `translateX(-${currentIndex * 100}%)`;
                }
            }, 5000);
        }

        document.getElementById('prev').addEventListener('click', function() {
            const slides = document.querySelectorAll('.testimonial-slide');
            const totalSlides = slides.length;
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            document.getElementById('testimonial-container').style.transform = `translateX(-${currentIndex * 100}%)`;
        });

        document.getElementById('next').addEventListener('click', function() {
            const slides = document.querySelectorAll('.testimonial-slide');
            const totalSlides = slides.length;
            currentIndex = (currentIndex + 1) % totalSlides;
            document.getElementById('testimonial-container').style.transform = `translateX(-${currentIndex * 100}%)`;
        });

        window.onload = () => {
            fetchTestimonios();
        };
    </script>

</body>
</html>

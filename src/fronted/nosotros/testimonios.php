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
        <?php if ($isLoggedIn): ?>
            <button id="openModal" class="bg-blue-500 text-white p-2 rounded">Ingresar Comentario</button>
        <!-- <button id="openModal" onclick="window.location.href='../nosotros/admin_testimonios.php'" class="bg-blue-500 text-white p-2 rounded">Actualizar Comentario</button> -->
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
                    <label for="usuario_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <select id="usuario_id" name="usuario_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm" required>
                        <!-- Opciones de usuarios generadas dinámicamente -->
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal" class="bg-red-500 text-white p-2 rounded mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de éxito -->
    <div id="successModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
            <h2 class="text-2xl font-bold text-green-600 mb-4">¡Comentario Agregado!</h2>
            <p class="text-gray-700 mb-4">El comentario ha sido agregado exitosamente.</p>
            <button class="bg-green-500 text-white p-2 rounded hover:bg-green-700 transition duration-300" onclick="closeSuccessModal()">Aceptar</button>
        </div>
    </div>

    <script src="../js/script_testimonios.js"></script>
    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.add('hidden');
        });

        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Lógica para enviar el formulario al servidor (si es necesario)
            document.getElementById('myModal').classList.add('hidden');
            document.getElementById('successModal').classList.remove('hidden');
            document.getElementById('comentario').value = ''; // Limpiar el textarea de comentario
        });

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>
</body>
</html>

<?php 
    include '../../backend/config/admin_session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrador Comentarios</title>
</head>
<body class="min-h-screen flex bg-gray-100">
    <!-- Barra Lateral de Administracion -->
    <!-- sidenav -->
    <?php include 'dashboard_sidebar.php'; ?>

    <main class="flex-1 p-6 md:ml-64">
        <!-- Navbar -->
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de administrar Comentarios</h1>
        </div>

        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <p class="text-gray-700 text-justify rounded-lg overflow-hidden w-full max-w-4xl">
                Bienvenido a la sección de administración de comentarios de PetServices. Aquí puedes gestionar los comentarios registrados por los usuarios en la página web.
                Recuerda utilizar correctamente las herramientas proporcionadas.
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden w-full max-w-4xl">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="w-full bg-blue-400 text-white">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Comentario</th>
                        <th class="py-3 px-6 text-left">Estrellas</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody id="testimoniosTable" class="bg-white divide-y divide-gray-200">
                    <!-- Filas de testimonios se llenarán aquí -->
                </tbody>
            </table>
        </div>

        <!-- Modal de Edición -->
        <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl relative">
                <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-4xl font-bold text-gray-800 mb-8">Editar Testimonio</h2>
                <form id="editForm" action="update_testimonio.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
                    <input type="hidden" id="testimonio_id" name="testimonio_id">
                    <div class="mb-6">
                        <label for="comentario" class="block text-lg text-gray-700 mb-2">Comentario:</label>
                        <textarea id="comentario" name="comentario" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe tu comentario aquí..."></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="estrellas" class="block text-lg text-gray-700 mb-2">Estrellas:</label>
                        <input type="number" id="estrellas" name="estrellas" min="1" max="5" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Califica de 1 a 5 estrellas">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="w-full bg-blue-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal de Éxito -->
        <div id="successModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md relative text-center">
                <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closeSuccessModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-4xl font-bold text-gray-800 mb-8">¡Proceso Satisfactorio!</h2>
                <p class="text-gray-700 mb-4">El comentario ha sido actualizado correctamente.</p>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300" onclick="closeSuccessModal()">Aceptar</button>
            </div>
        </div>
    </main>
    

    <script>
        fetch('../../backend/CRUDComentarios/get_testimonios.php')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#testimoniosTable');
                data.forEach(testimonio => {
                    const tr = document.createElement('tr');
                    tr.classList.add('hover:bg-gray-100');
                    tr.innerHTML = `
                        <td class="py-4 px-6">${testimonio.nombre}</td>
                        <td class="py-4 px-6">${testimonio.comentario}</td>
                        <td class="py-4 px-6">${testimonio.estrellas}</td>
                        <td class="py-4 px-6">
                            <button class="bg-blue-500 text-white py-1 px-3 rounded" onclick="openModal(${testimonio.id}, '${testimonio.comentario}', ${testimonio.estrellas})">Editar</button>
                            <button class="bg-red-500 text-white py-1 px-3 rounded" onclick="deleteTestimonio(${testimonio.id})">Eliminar</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            });

        function openModal(id, comentario, estrellas) {
            document.getElementById('testimonio_id').value = id;
            document.getElementById('comentario').value = comentario;
            document.getElementById('estrellas').value = estrellas;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            location.reload(); // Recarga la página para actualizar la lista de testimonios
        }

        function submitForm() {
            const formData = new FormData(document.getElementById('editForm'));
            fetch('../../backend/CRUDComentarios/update_testimonio.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('editModal').classList.add('hidden');
                document.getElementById('successModal').classList.remove('hidden');
            });
        }

        function deleteTestimonio(id) {
            fetch(`../../backend/CRUDComentarios/delete_testimonio.php?id=${id}`, { method: 'DELETE' })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    location.reload(); // Recarga la página para actualizar la lista de testimonios
                });
        }
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/dashboard.js"></script>
</body>
</html>

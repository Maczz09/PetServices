<?php 
include '../html/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Bienvenido Administrador</h1>
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
    <script>
        // Código para obtener testimonios y llenar la tabla
        fetch('get_usuarios.php');
        fetch('get_testimonios.php')
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
                            <button class="bg-blue-500 text-white py-1 px-3 rounded" onclick="editTestimonio(${testimonio.id})">Editar</button>
                            <button class="bg-red-500 text-white py-1 px-3 rounded" onclick="deleteTestimonio(${testimonio.id})">Eliminar</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            });

        function editTestimonio(id) {
            window.location.href = `edit_testimonio.php?id=${id}`;
        }

        function deleteTestimonio(id) {
            //console.log(`Delete ID: ${id}`);
            // window.location.href=`delete_testimonio.php?id=${id}`;
            fetch(`delete_testimonio.php?id=${id}`, { method: 'DELETE' })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    location.reload(); // Recarga la página para actualizar la lista de testimonios
                });
        }
    </script>
    <?php
    if(isset($mensaje)){
        echo $mensaje;
    }
?>
</body>
</html>

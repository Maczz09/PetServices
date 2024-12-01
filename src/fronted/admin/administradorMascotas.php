<?php 
include '../../backend/config/admin_session.php';
include '../../backend/CRUDmascotas/mostrar_mascotas.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administración de Mascotas</title>
</head>

<body class="min-h-screen flex flex-col bg-gray-100">
    <!-- sidenav -->
    <?php include 'dashboard_sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-6">
        <!-- Navbar -->
        <div class="flex items-center justify-between bg-white p-4 shadow-md rounded-lg mb-6">
            <button class="md:hidden text-gray-900" onclick="toggleSidebar()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">Sección de Subir Mascotas</h1>
        </div>

        <!-- Descripción de la sección -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <p class="text-gray-700 text-justify">
                Bienvenido a la sección de administración de mascotas de Pet Services. Aquí puedes gestionar las mascotas del sistema,
                incluyendo la posibilidad de agregar nuevas mascotas, editar información existente y eliminar mascotas que ya no sean necesarias.
                Utiliza las herramientas proporcionadas a continuación para mantener la base de datos actualizada y organizada de manera adecuada.
            </p>
        </div>

        <!-- Botón para abrir el modal de Agregar Mascota -->
        <button class="bg-green-500 text-white px-4 py-2 rounded m-4" onclick="openAddPetModal()">Agregar Mascota</button>

        <!-- Tabla de Mascotas -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Edad (Años)</th>
                <th class="px-4 py-2">Edad (Meses)</th>
                <th class="px-4 py-2">Género</th>
                <th class="px-4 py-2">Enfermedad</th>
                <th class="px-4 py-2">Historia</th>
                <th class="px-4 py-2">Otros Detalles</th>
                <th class="px-4 py-2">Tipo de Mascota</th>
                <th class="px-4 py-2">Actividad</th>
                <th class="px-4 py-2">Peso</th>
                <th class="px-4 py-2">Tamaño</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mascotas as $mascota): ?>
            <tr class="text-gray-700">
                <td class="border px-4 py-2"><?php echo $mascota['id']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['nombre']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['edad']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['edad_meses']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['genero']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['tiene_enfermedad'] === 'Si' ? $mascota['enfermedad'] : 'Ninguna'; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['historia']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['otros_detalles']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['tipo_mascota']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['actividad']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['peso']; ?></td>
                <td class="border px-4 py-2"><?php echo $mascota['tamano']; ?></td>
                <td class="border px-4 py-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openEditModal(<?php echo $mascota['id']; ?>)">Editar</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="openDeleteModal(<?php echo $mascota['id']; ?>)">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

        <!-- Modal Agregar Mascota -->
<div id="addPetModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full overflow-y-auto" style="max-height: 90vh;">
        <form action="/PetServices/src/backend/CRUDmascotas/agregar_mascotas.php" method="POST" enctype="multipart/form-data">
            <h2 class="text-xl font-semibold mb-4">Agregar Nueva Mascota</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="border p-2 w-full mb-2" required>

            <label for="edad">Edad (Años):</label>
            <input type="number" name="edad" class="border p-2 w-full mb-2" min="0" required>

            <label for="edad_meses">Edad (Meses):</label>
            <input type="number" name="edad_meses" class="border p-2 w-full mb-2" min="0" max="11" required>

            <label for="genero">Género:</label>
            <select name="genero" class="border p-2 w-full mb-2" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>

            <label for="tiene_enfermedad">¿Tiene alguna enfermedad?</label>
            <select name="tiene_enfermedad" id="tiene_enfermedad" class="border p-2 w-full mb-2" onchange="mostrarCampoEnfermedad()" required>
                <option value="No">No</option>
                <option value="Si">Sí</option>
            </select>

            <div id="campo_enfermedad" class="mb-4" style="display:none;">
                <label for="enfermedad">¿Qué enfermedad tiene?</label>
                <input type="text" name="enfermedad" id="enfermedad" class="border p-2 w-full mb-2" />
            </div>

            <label for="historia">Historia:</label>
            <textarea name="historia" id="historia" rows="3" class="border p-2 w-full mb-2"></textarea>

            <label for="tipo_mascota">Tipo de Mascota:</label>
            <select name="tipo_mascota" class="border p-2 w-full mb-2" required>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Conejo">Conejo</option>
                <option value="Ave">Ave</option>
                <option value="Otros">Otros</option>
            </select>

            <label for="actividad">Nivel de Actividad:</label>
            <select name="actividad" class="border p-2 w-full mb-2" required>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>

            <label for="peso">Peso:</label>
            <select name="peso" class="border p-2 w-full mb-2" required>
                <option value="0-5kg">0-5kg</option>
                <option value="5-10kg">5-10kg</option>
                <option value="10-20kg">10-20kg</option>
                <option value="20kg+">20kg+</option>
            </select>

            <label for="tamano">Tamaño:</label>
            <select name="tamano" class="border p-2 w-full mb-2" required>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>

            <label for="foto">Foto de la Mascota:</label>
            <input type="file" name ="foto" id="foto" class="border p-2 w-full mb-2" accept="image/*" required />

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Mascota</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeModal()">Cancelar</button>
        </form>
    </div>
</div>

<!-- Modal Editar Mascota -->
<div id="editPetModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full overflow-y-auto" style="max-height: 90vh;">
        <form id="editPetForm" action="/PetServices/src/backend/CRUDmascotas/editar_mascotas.php" method="POST" enctype="multipart/form-data">
            <h2 class="text-xl font-semibold mb-4">Editar Información de Mascota</h2>

            <input type="hidden" name="id" id="editId">

            <label for="editNombre">Nombre:</label>
            <input type="text" name="nombre" id="editNombre" class="border p-2 w-full mb-2" required>

            <label for="editEdad">Edad (Años):</label>
            <input type="number" name="edad" id="editEdad" class="border p-2 w-full mb-2" min="0" required>

            <label for="editEdadMeses">Edad (Meses):</label>
            <input type="number" name="edad_meses" id="editEdadMeses" class="border p-2 w-full mb-2" min="0" max="11" required>

            <label for="editGenero">Género:</label>
            <select name="genero" id="editGenero" class="border p-2 w-full mb-2" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>

            <label for="editTieneEnfermedad">¿Tiene alguna enfermedad?</label>
            <select name="tiene_enfermedad" id="editTieneEnfermedad" class="border p-2 w-full mb-2" onchange="mostrarCampoEditarEnfermedad()" required>
                <option value="No">No</option>
                <option value="Si">Sí</option>
            </select>

            <div id="campoEditarEnfermedad" class="mb-4" style="display:none;">
                <label for="editEnfermedad">¿Qué enfermedad tiene?</label>
                <input type="text" name="enfermedad" id="editEnfermedad" class="border p-2 w-full mb-2">
            </div>

            <label for="editHistoria">Historia:</label>
            <textarea name="historia" id="editHistoria" rows="3" class="border p-2 w-full mb-2"></textarea>

            <label for="editTipoMascota">Tipo de Mascota:</label>
            <select name="tipo_mascota" id="editTipoMascota" class="border p-2 w-full mb-2" required>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Conejo">Conejo</option>
                <option value="Ave">Ave</option>
                <option value="Otros">Otros</option>
            </select>

            <label for="editActividad">Nivel de Actividad:</label>
            <select name="actividad" id="editActividad" class="border p-2 w-full mb-2" required>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>

            <label for="editPeso">Peso:</label>
            <select name="peso" id="editPeso" class="border p-2 w-full mb-2" required>
                <option value="0-5kg">0-5kg</option>
                <option value="5-10kg">5-10kg</option>
                <option value="10-20kg">10-20kg</option>
                <option value="20kg+">20kg+</option>
            </select>

            <label for="editTamano">Tamaño:</label>
            <select name="tamano" id="editTamano" class="border p-2 w-full mb-2" required>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>

            <label for="editFoto">Foto de la Mascota:</label>
            <input type="file" name="foto" id="editFoto" class="border p-2 w-full mb-2" accept="image/*">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeEditPetModal()">Cancelar</button>
        </form>
    </div>
</div>

        <!-- Modal Eliminar Mascota -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-xl font-semibold mb-4">Eliminar Mascota</h2>
        <p>¿Estás seguro de que deseas eliminar esta mascota?</p>
        <form id="deleteForm" action="/PetServices/src/backend/CRUDmascotas/eliminar_mascotas.php" method="POST">
            <input type="hidden" name="idmascota" id="deleteId" value="">
            <div class="mt-4">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeDeleteModal()">Cancelar</button>
            </div>
        </form>
    </div>
</div>
    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/dashboard.js"></script>
    <script src="http://localhost/petservices/src/fronted/js/CRUDMascotas.js"></script>
</body>

</html>
<?php 
include '../../backend/config/admin_session.php';
include '../../backend/CRUDvet/mostrar_veterinario.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../output.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Administrador PetServices</title>
    <link rel="shortcut icon" href="../images/perro.png">

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
            <h1 class="text-xl font-semibold text-gray-800">Sección de administrar Veterinarios</h1>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <p class="text-gray-700 text-justify">
        Bienvenido a la sección de administración de veterinarios de Pet Services. Aquí puedes gestionar los veterinarios registrados en el sistema.
        Utiliza las herramientas proporcionadas a continuación para mantener la base de datos actualizada y 
        organizada de manera adecuada.
    </p>
    
</div>
        <!-- Content -->
        
        </div>
        <!-- Tabla de Veterinatios -->
        <h1 class="text-2xl roboto-mono-500 text-gray-800"> Veterinarios </h1>
        <!-- Botón para abrir el modal de Agregar Veterinario -->
        <button class="bg-green-500 text-white px-4 py-2 rounded m-4" onclick="openAddUserModal()">Agregar
            Veterinario</button>
         <button onclick="openDeleteModal()" class="bg-red-500 text-white px-4 py-2 rounded">
            Eliminar Veterinario
        </button>
        <button class="bg-blue-500 text-white px-4 py-2 rounded"
                onclick="openEditModal()">
            Editar Veterinario
        </button>

        <!-- Modal para eliminar veterinario -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 z-40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Eliminar Veterinario</h2>
                
                <!-- Formulario para ingresar el ID del veterinario -->
                <div id="modalContent">
                    <label for="vetIdInput" class="block mb-2">ID del Veterinario:</label>
                    <input type="number" id="vetIdInput" class="w-full border rounded p-2 mb-4">
                    <button onclick="checkVetId()" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Buscar
                    </button>
                </div>
                
                <!-- Botón para cerrar el modal -->
                <button onclick="closeDeleteModal()" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">
                    Cancelar
                </button>
            </div>
        </div>

        <!-- Modal para encontrar y editar veterinario -->
        <div id="editSearchModal" class="hidden fixed inset-0 bg-black/50 z-40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Buscar Veterinario</h2>
                <label for="editVetIdInput" class="block mb-2">ID del Veterinario:</label>
                <input type="number" id="editVetIdInput" class="w-full border rounded p-2 mb-4" placeholder="Ingrese el ID">
                <button onclick="fetchVeterinarianForEdit()" class="bg-blue-500 text-white px-4 py-2 rounded w-full">
                    Buscar
                </button>
                <button class="mt-4 bg-gray-500 text-white px-4 py-2 rounded w-full" onclick="closeEditSearchModal()">
                    Cancelar
                </button>
            </div>
        </div>
         <!-- Fin Modal para encontrar veterinario -->
          
        <!-- Modal para editar veterinario -->
        <div id="editVetModal" class="hidden fixed inset-0 bg-black/50 z-40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96 max-h-[80vh] overflow-y-auto">
                <h2 class="text-lg font-bold mb-4">Editar Veterinario</h2>
                <form id="editVetForm" enctype="multipart/form-data"> <!-- Asegúrate de que el formulario soporte archivos -->
                    <!-- Otros campos del formulario -->

                    <!-- Campo oculto para enviar el id_veterinario -->
                    <input type="hidden" name="id_veterinario" value="<?php echo $veterinario['id_veterinario']; ?>">
                    <input type="hidden" id="editVetId" name="id_veterinario">
                    
                    <label for="editVetName" class="block mb-2">Nombre:</label>
                    <input type="text" id="editVetName" name="nombre" class="w-full border rounded p-2 mb-4">
                    
                    <label for="editVetLastName" class="block mb-2">Apellido:</label>
                    <input type="text" id="editVetLastName" name="apellido" class="w-full border rounded p-2 mb-4">
                    
                    <label for="editVetAddress" class="block mb-2">Dirección:</label>
                    <input type="text" id="editVetAddress" name="direccion" class="w-full border rounded p-2 mb-4">
                    
                    <label for="editVetEmail" class="block mb-2">Email:</label>
                    <input type="email" id="editVetEmail" name="email" class="w-full border rounded p-2 mb-4">

                    <label for="editVetTelefono" class="block mb-2">Teléfono:</label>
                    <input type="text" id="editVetTelefono" name="telefono" class="w-full border rounded p-2 mb-4">

                    <!-- Mostrar imagen de perfil si está disponible -->
                    <label for="editVetFotoperfil" class="block text-sm font-medium text-gray-700 mb-2">Sube tu foto de perfil</label>
                    <img id="editVetFotoperfilImage" src="" alt="Foto de perfil" class="w-32 h-32 object-cover mb-4" style="display:none;">
                    <input type="file" id="editVetFotoperfil" name="fotoperfil" class="w-full border rounded p-2 mb-4">


                    <label for="editVetSede" class="block mb-2">Sede:</label>
                    <input type="text" id="editVetSede" name="sede" class="w-full border rounded p-2 mb-4">

                    <label for="editVetBiografia" class="block mb-2">Biografía:</label>
                    <textarea id="editVetBiografia" name="biografia" class="w-full border rounded p-2 mb-4"></textarea>

                    <label for="editVetIdcategoriaespecialidad" class="block mb-2">ID Especialidad:</label>
                    <input type="text" id="editVetIdcategoriaespecialidad" name="idcategoriaespecialidad" class="w-full border rounded p-2 mb-4">

                    <label for="editVetCurriculum_vitae" class="block mb-2">Currículum (URL de OneDrive):</label>
                    <input type="url" id="editVetCurriculum_vitae" name="curriculum_vitae" class="w-full border rounded p-2 mb-4" placeholder="Ingresa el enlace de OneDrive">


                    <button type="button" onclick="updateVet()" class="bg-green-500 text-white px-4 py-2 rounded w-full">
                        Guardar Cambios
                    </button>
                </form>
                <button class="mt-4 bg-gray-500 text-white px-4 py-2 rounded w-full" onclick="closeEditVetModal()">
                    Cancelar
                </button>
            </div>
        </div>


        <!-- Fin Modal para editar veterinario -->

        <!-- Modal para mostrar veterinario -->

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2">IDVeterinario</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellido</th>
                        <th class="px-4 py-2">Sede</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Dirección</th>
                        <th class="px-4 py-2">Biografía</th>
                        <th class="px-4 py-2">Foto de perfil</th>
                        <th class="px-4 py-2">Especialidad</th>
                        <th class="px-4 py-2">Curriculum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($veterinarios as $veterinario): ?>
                    <tr class="text-gray-700">
                        <td class="border px-4 py-2"><?php echo $veterinario['id_veterinario']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['nombre']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['apellido']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['sede']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['email']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['telefono']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['direccion']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['biografia']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['fotoperfil']; ?></td>
                        <td class="border px-4 py-2"><?php echo $veterinario['idcategoriaespecialidad']; ?></td>
                        <td class="border px-4 py-2">
                            <?php if (!empty($veterinario['curriculum_vitae'])): ?>
                                <a href="<?php echo $veterinario['curriculum_vitae']; ?>" target="_blank" class="text-blue-500 underline">Ver Curriculum</a>
                            <?php else: ?>
                                No disponible
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>



        <!-- Modal Agregar Veterinario -->
        <div id="addUserModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 max-w-md max-h-screen overflow-y-auto">
                <form action="../../backend/CRUDvet/agregar_veterinario.php" method="POST" enctype="multipart/form-data">
                    <h2 class="text-xl font-semibold mb-4">Agregar Nuevo Veterinario</h2>

                    <label for="Nombre">Nombre:</label>
                    <input type="text" id="editNombre" name="nombre" class="border p-2 w-full mb-2">

                    <label for="Apellido">Apellido:</label>
                    <input type="text" id="editApellido" name="apellido" class="border p-2 w-full mb-2">

                    <label for="Sede">Sede:</label>
                    <input type="text" id="editSede" name="sede" class="border p-2 w-full mb-2">

                    <label for="Email">Email:</label>
                    <input type="Email" id="editEmail" name="email" class="border p-2 w-full mb-2">

                    <label for="Telefono">Número de Teléfono:</label>
                    <input type="text" id="editTelefono" name="telefono" class="border p-2 w-full mb-2">

                    <label for="Direccion">Dirección:</label>
                    <input type="text" id="editDireccion" name="direccion" class="border p-2 w-full mb-2">

                    <label for="Biografia">Biografía:</label>
                    <input type="text" id="editBiografia" name="biografia" class="border p-2 w-full mb-2">

                    <!-- Cambiar el campo de foto de perfil para que sea un input de tipo file -->
                    <label for="Fotoperfil">Foto de Perfil (JPG):</label>
                    <input type="file" id="editFotoperfil" name="fotoperfil" class="border p-2 w-full mb-2" accept=".jpg, .jpeg">

                    <label for="Idcategoriaespecialidad">Especialidad:</label>
                    <select id="editEspecialidad" name="idcategoriaespecialidad" class="border p-2 w-full mb-2">
                        <option value="1">Animales Pequeños</option>
                        <option value="2">Animales Grandes</option>
                        <option value="3">Animales Exóticos</option>
                    </select>

                    <label for="Curriculum_vitae">Curriculum:</label>
                    <input type="url" id="editCurriculum_vitae" name="curriculum_vitae" class="border p-2 w-full mb-2" placeholder="Ingrese el enlace de OneDrive" pattern="https://.*" title="Debe ser un enlace de OneDrive válido (ejemplo: https://onedrive.live.com/...)">


                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeAddUserModal()">Cancelar</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Veterinario</button>
                    </div>
                </form>
            </div>
        </div>
    
    
    </main>


    <script src="http://localhost/petservices/src/fronted/js/CRUDvets.js"></script>
</body>

</html>
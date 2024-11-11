<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subir Mascota</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Mostrar campo de enfermedad si selecciona 'Si'
      function mostrarCampoEnfermedad() {
        const tieneEnfermedad = document.getElementById('tiene_enfermedad').value;
        const campoEnfermedad = document.getElementById('campo_enfermedad');
        campoEnfermedad.style.display = tieneEnfermedad === 'Si' ? 'block' : 'none';
      }
    </script>
  </head>
  <body class="bg-gray-100">
    <div class="container mx-auto my-10">
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Subir Nueva Mascota</h2>
        <form action="subir_form_mascota.php" method="post" enctype="multipart/form-data">
          <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre de la Mascota</label>
            <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border rounded-lg" required />
          </div>
          <div class="mb-4">
            <label for="edad_anos" class="block text-gray-700 font-bold mb-2">Edad (Años)</label>
            <input type="number" name="edad_anos" id="edad_anos" class="w-full px-3 py-2 border rounded-lg" min="0" required />
          </div>
          <div class="mb-4">
            <label for="edad_meses" class="block text-gray-700 font-bold mb-2">Edad (Meses)</label>
            <input type="number" name="edad_meses" id="edad_meses" class="w-full px-3 py-2 border rounded-lg" min="0" max="11" required />
          </div>
          <div class="mb-4">
            <label for="genero" class="block text-gray-700 font-bold mb-2">Género</label>
            <select name="genero" id="genero" class="w-full px-3 py-2 border rounded-lg" required>
              <option value="Macho">Macho</option>
              <option value="Hembra">Hembra</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="tiene_enfermedad" class="block text-gray-700 font-bold mb-2">¿Tiene alguna enfermedad?</label>
            <select name="tiene_enfermedad" id="tiene_enfermedad" class="w-full px-3 py-2 border rounded-lg" onchange="mostrarCampoEnfermedad()" required>
              <option value="No">No</option>
              <option value="Si">Sí</option>
            </select>
          </div>
          <div id="campo_enfermedad" class="mb-4" style="display:none;">
            <label for="enfermedad" class="block text-gray-700 font-bold mb-2">¿Qué enfermedad tiene?</label>
            <input type="text" name="enfermedad" id="enfermedad" class="w-full px-3 py-2 border rounded-lg" />
          </div>
          <div class="mb-4">
            <label for="historia" class="block text-gray-700 font-bold mb-2">Historia</label>
            <textarea name="historia" id="historia" rows="3" class="w-full px-3 py-2 border rounded-lg"></textarea>
          </div>
          <div class="mb-4">
            <label for="tipo_mascota" class="block text-gray-700 font-bold mb-2">Tipo de Mascota</label>
            <select name="tipo_mascota" id="tipo_mascota" class="w-full px-3 py-2 border rounded-lg" required>
              <option value="Perro">Perro</option>
              <option value="Gato">Gato</option>
              <option value="Conejo">Conejo</option>
              <option value="Ave">Ave</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="actividad" class="block text-gray-700 font-bold mb-2">Nivel de Actividad</label>
            <select name="actividad" id="actividad" class="w-full px-3 py-2 border rounded-lg" required>
              <option value="Alta">Alta</option>
              <option value="Media">Media</option>
              <option value="Baja">Baja</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="peso" class="block text-gray-700 font-bold mb-2">Peso</label>
            <select name="peso" id="peso" class="w-full px-3 py-2 border rounded-lg" required>
              <option value="0-5kg">0-5kg</option>
              <option value="5-10kg">5-10kg</option>
              <option value="10-20kg">10-20kg</option>
              <option value="20kg+">20kg+</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="tamano" class="block text-gray-700 font-bold mb-2">Tamaño</label>
            <select name="tamano" id="tamano" class="w-full px-3 py-2 border rounded-lg" required>
              <option value="Pequeño">Pequeño</option>
              <option value="Mediano">Mediano</option>
              <option value="Grande">Grande</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="foto" class="block text-gray-700 font-bold mb-2">Foto de la Mascota</label>
            <input type="file" name="foto" id="foto" class="w-full px-3 py-2 border rounded-lg" accept="image/*" required />
          </div>
          <div class="text-center">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Subir Mascota</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

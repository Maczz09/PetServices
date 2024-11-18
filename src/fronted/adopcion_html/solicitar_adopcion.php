<?php 
include '../../backend/adopcion/enviar_datos_usuario.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Adopción</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <main class="bg-slate-200 mt-20 p-6">
    <!-- Banner -->
    <div class="relative bg-cover bg-center h-[30rem]" style="background-image: url('../images/banner_form_adop.webp');">
        <div class="absolute inset-0 bg-opacity-50 flex justify-center items-center">
            <h1 class="text-white text-4xl font-bold">Formulario de Adopción</h1>
        </div>
    </div>

    <section class="bg-gray-100 relative">
        <div class="mx-auto max-w-screen-2xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:h-screen lg:grid-cols-2">
                <!-- Imagen -->
                <div class="relative z-0 lg:py-16">
                    <div class="relative h-64 sm:h-80 lg:h-full">
                        <img
                            alt=""
                            src="../images/perros01.png"
                            class="absolute inset-0 h-full w-full object-cover z-0"
                        />
                    </div>
                </div>

                <!-- Formulario -->
                <div class="relative flex items-center bg-gray-100">
                    <div class="p-8 sm:p-16 lg:p-24">
                        <h2 class="text-2xl font-bold sm:text-3xl">Solicitud de Adopción</h2>
                        <p class="mt-4 text-gray-600">Por favor, verificar sus datos antes de solicitar la adopción</p>

                        <form action="../../backend/adopcion/procesar_adopcion.php" method="POST" class="space-y-4">
                            <input type="hidden" name="id_mascota" value="<?php echo htmlspecialchars($id_mascota); ?>">

                            <!-- Información del usuario -->
                            <div>
                                <label for="nombre_usuario" class="block text-sm font-medium text-gray-700">Nombre:</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                    id="nombre_usuario"
                                    name="nombre_usuario"
                                    value="<?php echo htmlspecialchars($usuario_data['nombre']); ?>"
                                    readonly
                                />
                            </div>

                            <div>
                                <label for="apellido_usuario" class="block text-sm font-medium text-gray-700">Apellido:</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                    id="apellido_usuario"
                                    name="apellido_usuario"
                                    value="<?php echo htmlspecialchars($usuario_data['apellido']); ?>"
                                    readonly
                                />
                            </div>

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="email_usuario" class="block text-sm font-medium text-gray-700">Email:</label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                        id="email_usuario"
                                        name="email_usuario"
                                        value="<?php echo htmlspecialchars($usuario_data['email']); ?>"
                                        readonly
                                    />
                                </div>

                                <div>
                                    <label for="direccion_usuario" class="block text-sm font-medium text-gray-700">Dirección:</label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                        id="direccion_usuario"
                                        name="direccion_usuario"
                                        value="<?php echo htmlspecialchars($usuario_data['direccion']); ?>"
                                        readonly
                                    />
                                </div>
                            </div>

                            <div>
                                <label for="telefono_usuario" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                    id="telefono_usuario"
                                    name="telefono_usuario"
                                    value="<?php echo htmlspecialchars($usuario_data['num_telefono']); ?>"
                                    readonly
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Formulario de información adicional -->
<section class="bg-gray-100">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white p-8 shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Información adicional</h2>
                <p class="text-lg text-gray-600 mb-8">Por favor, complete la siguiente información adicional.</p>
                
                <form action="../../backend/adopcion/procesar_adopcion.php" method="POST" class="space-y-4" id="adopcionForm">
                    <input type="hidden" name="id_mascota" value="<?php echo htmlspecialchars($_POST['id_mascota']); ?>">
                    
        <!-- Preguntas de información adicional -->
        <div>
          <label for="pregunta1" class="block text-sm font-medium text-gray-700">1. ¿Por qué desea adoptar una mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta1"
            name="pregunta1"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta2" class="block text-sm font-medium text-gray-700">2. ¿Quién será el propietario de la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta2"
            name="pregunta2"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta3" class="block text-sm font-medium text-gray-700">3. ¿Tiene una vivienda propia o arrienda?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta3"
            name="pregunta3"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta4" class="block text-sm font-medium text-gray-700">4. ¿Qué tipo de vivienda posee?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta4"
            name="pregunta4"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta5" class="block text-sm font-medium text-gray-700">5. ¿Por qué considera apropiado adoptar esta mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta5"
            name="pregunta5"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta6" class="block text-sm font-medium text-gray-700">6. ¿Su familia está de acuerdo con la adopción?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta6"
            name="pregunta6"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta7" class="block text-sm font-medium text-gray-700">7. ¿Qué hará si la mascota llega a enfermarse?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta7"
            name="pregunta7"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta8" class="block text-sm font-medium text-gray-700">8. ¿Ha cambiado de domicilio los últimos años?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta8"
            name="pregunta8"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta9" class="block text-sm font-medium text-gray-700">9. En caso de vivir con niños, ¿Ellos saben cómo cuidar a la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta9"
            name="pregunta9"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta10" class="block text-sm font-medium text-gray-700">10. ¿Usted o alguno de sus convivientes tiene alguna alergia?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta10"
            name="pregunta10"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta11" class="block text-sm font-medium text-gray-700">11. ¿Dispone de tiempo para invertir en la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta11"
            name="pregunta11"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta12" class="block text-sm font-medium text-gray-700">12. ¿Si llega a viajar, con quién quedaría la mascota?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta12"
            name="pregunta12"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta13" class="block text-sm font-medium text-gray-700">13. ¿Es la primera mascota que ha adoptado?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta13"
            name="pregunta13"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>

        <div>
          <label for="pregunta14" class="block text-sm font-medium text-gray-700">14. ¿En su hogar convive con otras mascotas?</label>
          <textarea
            class="w-full rounded-lg border-gray-200 p-3 text-sm"
            id="pregunta14"
            name="pregunta14"
            rows="5"
            oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
            style="resize: none;"
          ></textarea>
        </div>
        <!-- Comentario -->
          <div class="mt-8">
            <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario:</label>
            <textarea
              class="w-full rounded-lg border-gray-200 p-3 text-sm"
              id="comentario"
              name="comentario"
              rows="5"
              oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"
              style="resize: none;"
            ></textarea>
          </div>
        <button type="submit" class="w-full rounded-lg bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Enviar</button>
      </form>
    </div>
  </div>
</section>
<!-- Modal de error -->
    <div id="errorModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg border-s-4 border-red-500 p-6 w-96">
            <div class="flex items-center gap-2 text-red-800">
                <strong class="block font-medium">Complete los campos requeridos</strong>
            </div>
            <p id="errorText" class="mt-2 text-sm text-red-700"></p>
            <div class="mt-4 text-right">
                <button onclick="modalManager.closeModal('errorModal')" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>
    </div>
    
    <!-- Modal de éxito -->
    <div id="successModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-xl border border-gray-100 p-6 w-96">
            <div class="flex items-start gap-4">
                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">¡Formulario enviado con éxito!</strong>
                    <p class="mt-1 text-sm text-gray-700">Gracias por completar la información adicional.</p>
                </div>
                <button onclick="modalManager.closeModal('successModal')" class="text-gray-500 transition hover:text-gray-600">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
  </main>

  <!-- Incluir el footer -->
    <?php include '../html/footer.php'; ?>
    <script src="../js/main.js"></script>
    <script src="../js/solicitar_adopcion.js"></script>
  </body>
</html>
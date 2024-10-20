<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="bg-gray-200 p-10 min-h-screen flex items-center justify-center">
        <div class="bg-gray-50 rounded-2xl shadow-lg w-full max-w-md p-6">
            <div class="w-full p-6">
                <h2 class="text-center text-lg font-bold text-[#296798]">Restablecer Contraseña</h2>
                <form class="flex flex-col gap-4 mt-6" id="reset-password-form" action="../../backend/login_register_reset/process_password_request.php?token=<?php echo $_GET['token']; ?>" method="POST">

                    <!-- Campo de Nueva Contraseña -->
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password" id="password" placeholder="Nueva Contraseña" required>
                        <button type="button" id="togglePassword" class="absolute top-1/2 right-3 -translate-y-1/2">
                            <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Campo de Confirmar Contraseña -->
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required>
                        <button type="button" id="toggleConfirmPassword" class="absolute top-1/2 right-3 -translate-y-1/2">
                            <svg id="eye-icon-confirm-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>

                    <button type="submit" class="bg-[#296798] rounded-xl text-white py-2 hover:scale-105 duration-300">Actualizar Contraseña</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal de Cargando -->
    <div id="loading-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full flex items-center justify-center">
            <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8h8a8 8 0 11-8-8z"></path>
            </svg>
            <p class="ml-4 text-gray-700 text-lg">Cargando...</p>
        </div>
    </div>

    <!-- Modal de Mensajes -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <p id="modal-message" class="text-gray-700 text-lg text-center"></p>
            <button id="modal-close" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 mx-auto block hover:bg-blue-600">Cerrar</button>
        </div>
    </div>

    <script>
        // Lógica para alternar visibilidad de la nueva contraseña
        const togglePassword = document.querySelector("#togglePassword");
        const passwordField = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        });

        // Lógica para alternar visibilidad de la confirmación de contraseña
        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const confirmPasswordField = document.querySelector("#confirm_password");

        toggleConfirmPassword.addEventListener("click", function () {
            const type = confirmPasswordField.getAttribute("type") === "password" ? "text" : "password";
            confirmPasswordField.setAttribute("type", type);
        });

        // Mostrar el modal de cargando
        function showLoadingModal(show) {
            const loadingModal = document.getElementById('loading-modal');
            if (show) {
                loadingModal.classList.remove('hidden');
            } else {
                loadingModal.classList.add('hidden');
            }
        }

        // Mostrar el modal de mensajes
        function showModal(message) {
            const modal = document.getElementById('modal');
            const modalMessage = document.getElementById('modal-message');

            modalMessage.textContent = message;
            modal.classList.remove('hidden');
        }

        // Ocultar el modal de mensajes al cerrar
        document.getElementById('modal-close').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        // Manejo de la lógica del formulario
        document.getElementById('reset-password-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado

            const formData = new FormData(this);

            // Mostrar el modal de cargando
            showLoadingModal(true);

            // Enviar el formulario con fetch
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                showLoadingModal(false); // Ocultar el modal de cargando
                showModal(data.message); // Mostrar el mensaje en el modal
            })
            .catch(error => {
                console.error('Error:', error);
                showLoadingModal(false); // Ocultar el modal de cargando
                showModal('Ocurrió un error. Inténtalo nuevamente.');
            });
        });
    </script>
</body>
</html>

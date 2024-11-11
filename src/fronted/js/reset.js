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
document.getElementById('usuario-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Mostrar el modal de cargando
    showLoadingModal(true);

    fetch('../../backend/login_register_reset/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            showLoadingModal(false); // Ocultar el modal de cargando
            showModal(data.message); // Mostrar el modal de mensaje
        })
        .catch(error => {
            console.error('Error:', error);
            showLoadingModal(false); // Ocultar el modal de cargando
            showModal('Ocurrió un error. Inténtalo nuevamente.');
        });
});

// Función para mostrar/ocultar el modal de cargando
function showLoadingModal(show) {
    const loadingModal = document.getElementById('loading-modal');
    if (show) {
        loadingModal.classList.remove('hidden');
    } else {
        loadingModal.classList.add('hidden');
    }
}

// Función para mostrar el modal de mensaje
function showModal(message) {
    const modal = document.getElementById('modal');
    const modalMessage = document.getElementById('modal-message');

    modalMessage.textContent = message;
    modal.classList.remove('hidden');
}

document.getElementById('modal-close').addEventListener('click', function() {
    document.getElementById('modal').classList.add('hidden');
});

function goBack() {
    window.history.back();
}
document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    if (passwordField.type === 'password') {
        passwordField.type = 'text'; // Mostrar la contraseña
        eyeIcon.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
    `;
    } else {
        passwordField.type = 'password'; // Ocultar la contraseña
        eyeIcon.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    `;
    }
});
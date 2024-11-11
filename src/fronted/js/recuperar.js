document.getElementById('recover-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevenir el comportamiento por defecto del formulario

    const formData = new FormData(this);

    // Mostrar el modal de cargando
    showLoadingModal(true);

    fetch('../../backend/login_register_reset/process_recovery.php', {
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
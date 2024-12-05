document.getElementById('openModal').addEventListener('click', () => {
    document.getElementById('myModal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('myModal').classList.add('hidden');
    document.getElementById('comentario').value = ''; // Limpiar el textarea de comentario
});

document.getElementById('commentForm').addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Deshabilitar el botón para evitar múltiples envíos
    const submitButton = document.querySelector('#commentForm button[type="submit"]');
    submitButton.disabled = true;
});

function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
}


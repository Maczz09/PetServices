function openEditModal(id) {
    // Hacer una solicitud AJAX al servidor para obtener los datos del usuario
    fetch(`../../backend/CRUDusers/obtener_usuario.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            // Precargar los datos en los campos del modal
            document.getElementById('editId').value = data.idusuario;
            document.getElementById('editNombre').value = data.nombre;
            document.getElementById('editApellido').value = data.apellido;
            document.getElementById('editEmail').value = data.email;
            document.getElementById('editTelefono').value = data.num_telefono;
            document.getElementById('editDireccion').value = data.direccion;
            document.getElementById('editRol').value = data.idrol;
            document.getElementById('editEmailVerificado').value = data.email_verificado;

            // Mostrar el modal
            document.getElementById('editModal').classList.remove('hidden');
        })
        .catch(error => console.error('Error al obtener el usuario:', error));
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
function openDeleteModal(id) {
    document.getElementById('deleteId').value = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

function togglePassword() {
    const passwordField = document.getElementById('editPassword');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}
function toggleAddPassword() {
    const passwordField = document.getElementById('addPassword');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}

function openAddUserModal() {
    document.getElementById('addUserModal').classList.remove('hidden');
}

function closeAddUserModal() {
    document.getElementById('addUserModal').classList.add('hidden');
}
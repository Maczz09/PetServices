// Modal de agregar servicio
function openAddServiceModal() {
    document.getElementById('addServiceModal').classList.remove('hidden');
}

function closeAddServiceModal() {
    document.getElementById('addServiceModal').classList.add('hidden');
}

// Modal de editar servicio
function openEditServiceModal(service) {
    // Llenar los campos del formulario de edición
    document.getElementById('edit_idservicio').value = service.idservicio;
    document.getElementById('edit_nombre_servicio').value = service.nombre_servicio;
    document.getElementById('edit_descripcion_servicio').value = service.descripcion_servicio;
    document.getElementById('edit_precio').value = service.precio;
    document.getElementById('edit_categoria').value = service.categoria;

    // Mostrar el modal de edición
    document.getElementById('editServiceModal').classList.remove('hidden');
}

function closeEditServiceModal() {
    document.getElementById('editServiceModal').classList.add('hidden');
}

// Mostrar modal específico de error
function closeModal(idservicio) {
    const modal = document.getElementById(`errorModal-${idservicio}`);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// Función para manejar eventos globales relacionados con formularios y botones
document.addEventListener('DOMContentLoaded', function() {
    // Botones relacionados con acciones en la página
    const deleteButtons = document.querySelectorAll('form[action$="eliminar_servicio.php"] button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este servicio? Esta acción no se puede deshacer.');
            if (!confirmDelete) {
                e.preventDefault();
            }
        });
    });

    // Mostrar modal de error específico para este servicio si la URL tiene el parámetro 'error'
    const urlParams = new URLSearchParams(window.location.search);
    const errorId = urlParams.get('idservicio');
    if (urlParams.get('error') === 'citas_asociadas' && errorId) {
        const modal = document.getElementById(`errorModal-${errorId}`);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

    // Mostrar modal de éxito si la URL tiene el parámetro 'success=true'
    if (urlParams.get('success') === 'true') {
        document.getElementById('successModal').classList.remove('hidden');
    }
});

// Función para cerrar el modal de éxito
function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
}



// Variable para almacenar el ID del servicio a eliminar
let serviceIdToDelete = null;

// Muestra el toast con la confirmación de eliminación
function showToast(serviceId) {
    serviceIdToDelete = serviceId;  // Guardamos el ID del servicio
    const toast = document.getElementById('toast');
    toast.classList.remove('hidden');  // Mostramos el toast
}

// Cancela la eliminación y oculta el toast
function cancelDelete() {
    const toast = document.getElementById('toast');
    toast.classList.add('hidden');  // Ocultamos el toast
}

// Realiza la eliminación del servicio
function confirmDelete() {
    if (serviceIdToDelete !== null) {
        // Enviamos una solicitud AJAX para eliminar el servicio
        fetch(`../../backend/CRUDservicios/eliminar_servicio.php`, {
            method: 'POST',
            body: JSON.stringify({ idservicio: serviceIdToDelete }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Ocultar el toast
                cancelDelete();
                // Recargar la página o eliminar el servicio de la tabla dinámicamente
                window.location.reload(); // Recargar la página
            } else {
                alert('Error al eliminar el servicio');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al intentar eliminar el servicio.');
        });
    }
}





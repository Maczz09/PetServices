// Modal de agregar servicio
function openAddServiceModal() {
    document.getElementById('addServiceModal').classList.remove('hidden');
}

function closeAddServiceModal() {
    document.getElementById('addServiceModal').classList.add('hidden');
}

// Modal de editar servicio
function openEditServiceModal(idservicio) {
    // Obtener el botón relacionado con este servicio
    const editButton = document.querySelector(`button[onclick="openEditServiceModal(${idservicio})"]`);

    // Obtener la ruta de la imagen desde el atributo personalizado data-imagen
    const imagenRuta = editButton.getAttribute('data-imagen');

    // Establecer el ID del servicio
    document.getElementById('edit_idservicio').value = idservicio;

    // Buscar la fila del servicio en la tabla y llenar los datos
    const fila = document.getElementById(`serviceRow-${idservicio}`);
    document.getElementById('edit_nombre_servicio').value = fila.children[1].textContent.trim();
    document.getElementById('edit_descripcion_servicio').value = fila.children[2].textContent.trim();
    document.getElementById('edit_precio').value = fila.children[3].textContent.trim();
    document.getElementById('edit_categoria').value = fila.children[4].textContent.trim();

    // Mostrar la imagen actual si existe
    const imagePreview = document.getElementById('editImagePreview');
    if (imagenRuta) {
        imagePreview.src = imagenRuta; // Asignar la ruta de la imagen
        imagePreview.style.display = 'block'; // Hacer visible la previsualización
    } else {
        imagePreview.style.display = 'none'; // Ocultar si no hay imagen
    }

    // Mostrar el modal
    document.getElementById('editServiceModal').classList.remove('hidden');
}

function closeEditServiceModal() {
    // Ocultar el modal de edición
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


//TOAST PARA CONFIRMAR-ALERTA ELIMINACION SERVICIO
let serviceIdToDelete = null; // Variable para almacenar el ID del servicio a eliminar

// Muestra el toast con el mensaje de eliminación
function showToast(serviceId, message, isError = false) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');

    // Asegúrate de ocultar cualquier mensaje anterior antes de mostrar uno nuevo
    toast.classList.add('hidden');
    toast.classList.remove('bg-red-500', 'bg-yellow-500'); // Limpiamos los colores anteriores

    toastMessage.textContent = message;

    if (isError) {
        // Cambia el color para advertencia (si hay citas asociadas)
        toast.classList.add('bg-yellow-500');
    } else {
        // Cambia el color para error general
        toast.classList.add('bg-red-500');
    }

    // Ahora mostramos el toast
    toast.classList.remove('hidden');  
}

// Cancela la eliminación y oculta el toast
function cancelDelete() {
    const toast = document.getElementById('toast');
    toast.classList.add('hidden');  // Ocultamos el toast
}

// Confirma la eliminación del servicio
function confirmDelete() {
    if (serviceIdToDelete !== null) {
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
                // Si la eliminación es exitosa, ocultamos el toast y eliminamos la fila de la tabla
                cancelDelete();

                // Eliminar la fila de la tabla sin recargar la página
                const row = document.getElementById(`serviceRow-${serviceIdToDelete}`);
                if (row) {
                    row.remove(); // Eliminar la fila correspondiente
                }
            } else {
                // Si hay citas asociadas o algún otro error, mostramos el mensaje de advertencia
                showToast(null, data.message, true); // Muestra el mensaje de advertencia si hay citas asociadas
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast(null, 'Hubo un error al intentar eliminar el servicio.', true); // Muestra mensaje de error general
        });
    }
}

// Función para mostrar el toast de eliminación
function showToast(serviceId) {
    serviceIdToDelete = serviceId;  // Guardamos el ID del servicio
    const toast = document.getElementById('toast');
    toast.classList.remove('hidden');  // Mostramos el toast
}













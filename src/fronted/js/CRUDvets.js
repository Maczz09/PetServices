// Abrir el modal de búsqueda
function openEditModal() {
    document.getElementById("editSearchModal").classList.remove("hidden");
}

// Cerrar el modal de búsqueda
function closeEditSearchModal() {
    document.getElementById("editSearchModal").classList.add("hidden");
}

// Cerrar el modal de edición
function closeEditVetModal() {
    document.getElementById("editVetModal").classList.add("hidden");
}

// Buscar veterinario por ID
function fetchVeterinarianForEdit() {
    const vetId = document.getElementById("editVetIdInput").value;

    if (!vetId) {
        alert("Por favor, ingresa un ID válido.");
        return;
    }

    fetch(`../../backend/CRUDvet/obtener_veterinario.php?id_veterinario=${vetId}`)
        .then(response => response.json())
        .then(data => {
            // Verificar qué datos devuelve el servidor
            console.log(data);  // Añade este log para ver la respuesta completa

            if (data.exists === false) {
                alert("El ID del veterinario no existe.");
            } else {
                // Precargar datos en el formulario de edición
                if (data.data) {
                    document.getElementById("editVetId").value = data.data.id_veterinario;
                    document.getElementById("editVetName").value = data.data.nombre;
                    document.getElementById("editVetLastName").value = data.data.apellido;
                    document.getElementById("editVetAddress").value = data.data.direccion;
                    document.getElementById("editVetEmail").value = data.data.email;
                    document.getElementById("editVetTelefono").value = data.data.telefono;
                    document.getElementById("editVetFotoperfilImage").value = data.data.fotoperfil;
                    document.getElementById("editVetSede").value = data.data.sede;
                    document.getElementById("editVetBiografia").value = data.data.biografia;
                    document.getElementById("editVetIdcategoriaespecialidad").value = data.data.idcategoriaespecialidad;
                    document.getElementById("editVetCurriculum_vitae").value = data.data.curriculum_vitae;


                    closeEditSearchModal(); // Cerrar modal de búsqueda
                    document.getElementById("editVetModal").classList.remove("hidden"); // Abrir modal de edición
                } else {
                    alert("Datos del veterinario no encontrados.");
                }
            }
        })
        .catch(error => {
            console.error("Error al obtener el veterinario:", error);
            alert("Hubo un problema al conectar con el servidor.");
        });
}




// Guardar los cambios
function updateVet() {
    const formData = new FormData(document.getElementById("editVetForm"));

    fetch(`../../backend/CRUDvet/editar_veterinario.php`, {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.text(); // Usar text() para inspeccionar la respuesta cruda
        })
        .then(data => {
            console.log("Respuesta del servidor:", data);
            try {
                const json = JSON.parse(data);
                if (json.success) {
                    alert("Veterinario actualizado correctamente.");
                    closeEditVetModal();
                    location.reload(); // Recargar la página
                } else {
                    alert(json.message || "No se pudo actualizar el veterinario.");
                }
            } catch (e) {
                console.error("La respuesta no es un JSON válido:", e);
                alert("Hubo un error inesperado.");
            }
        })
        .catch(error => {
            console.error("Error al actualizar el veterinario:", error);
            alert("Hubo un problema al conectar con el servidor.");
        });
}



function openDeleteModal() {
    document.getElementById("deleteModal").classList.remove("hidden");
}

function closeDeleteModal() {
    document.getElementById("deleteModal").classList.add("hidden");
    location.reload(); // Recargar la página
}

function checkVetId() {
    const vetId = document.getElementById("vetIdInput").value;

    fetch(`../../backend/CRUDvet/obtener_veterinario.php?id_veterinario=${vetId}`)
        .then(response => response.json())
        .then(data => {
            console.log("Respuesta del servidor:", data); // Depura la respuesta completa

            if (data.exists) {
                // Si el veterinario existe, mostramos sus datos
                let curriculumHtml = ''; // Variable para el link de OneDrive

                // Verificar si el link de curriculum_vitae está presente
                if (data.data.curriculum_vitae) {
                    curriculumHtml = `
                        <p><strong>Currículum:</strong> <a href="${data.data.curriculum_vitae}" target="_blank">Ver Curriculum</a></p>
                    `;
                }

                // Mostrar los datos del veterinario
                document.getElementById("modalContent").innerHTML = `
                    <p><strong>Nombre:</strong> ${data.data.nombre} ${data.data.apellido}</p>
                    <p><strong>Dirección:</strong> ${data.data.direccion}</p>
                    <p><strong>Email:</strong> ${data.data.email}</p>
                    <p><strong>Teléfono:</strong> ${data.data.telefono}</p>
                    ${curriculumHtml} <!-- Mostrar el link del curriculum si está presente -->
                    <button onclick="deleteVet(${vetId})" class="bg-red-500 text-white px-4 py-2 rounded">
                        Eliminar
                    </button>
                `;
            } else {
                // Mostrar mensaje de error si el veterinario no existe
                document.getElementById("modalContent").innerHTML = `
                    <p>${data.message}</p>
                `;
            }
        })
        .catch(error => console.error("Error:", error));
}




function deleteVet(vetId) {
    if (confirm("¿Estás seguro de que deseas eliminar este veterinario?")) {
        fetch(`../../backend/CRUDvet/eliminar_veterinario.php`, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id_veterinario=${vetId}`
        })
        .then(response => {
            // Verificar si la respuesta es JSON válida
            return response.json().catch(() => {
                throw new Error("Respuesta del servidor no válida.");
            });
        })
        .then(data => {
            if (data.success) {
                alert("Veterinario eliminado correctamente.");
                location.reload(); // Recargar la página
            } else {
                alert(data.message || "No se pudo eliminar el veterinario.");
            }
        })
        .catch(error => {
            console.error("Error al eliminar el veterinario:", error);
            alert("El veterinario se elimino con exito.");
            location.reload(); // Recargar la página
        });
    }
}




function openAddUserModal() {
    document.getElementById('addUserModal').classList.remove('hidden');
}

function closeAddUserModal() {
    document.getElementById('addUserModal').classList.add('hidden');
}
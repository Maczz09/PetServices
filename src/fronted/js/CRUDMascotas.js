function openAddPetModal() {
  document.getElementById("addPetModal").classList.remove("hidden");
}
function closeModal() {
  document.getElementById("addPetModal").classList.add("hidden");
}

function mostrarCampoEnfermedad() {
  const tieneEnfermedad = document.getElementById("tiene_enfermedad").value;
  const campoEnfermedad = document.getElementById("campo_enfermedad");
  campoEnfermedad.style.display = tieneEnfermedad === "Si" ? "block" : "none";
}

//JS para eliminar mascota
function openDeleteModal(id) {
  document.getElementById("deleteId").value = id; // Guardar el ID de la mascota a eliminar
  document.getElementById("deleteModal").classList.remove("hidden"); // Mostrar el modal
}

function closeDeleteModal() {
  document.getElementById("deleteModal").classList.add("hidden"); // Ocultar el modal
}

function confirmDelete() {
  const id = document.getElementById("deleteId").value; // Obtener el ID de la mascota
  // Realizar la solicitud para eliminar la mascota
  fetch(
    `/PetServices/src/backend/CRUDmascotas/eliminar_mascotas.php?id=${id}`,
    {
      method: "DELETE",
    }
  )
    .then((response) => {
      if (response.ok) {
        alert("Mascota eliminada con éxito.");
        closeDeleteModal(); // Cerrar el modal
        window.location.reload(); // Recargar la página para actualizar la lista
      } else {
        alert("Error al eliminar la mascota.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Error al eliminar la mascota.");
    });
}

//MODAL DE EDITAR
function openEditModal(id) {
  const modal = document.getElementById("editPetModal"); // Asegúrate de que el modal tenga este ID
  const form = modal.querySelector("form"); // Selecciona el formulario dentro del modal
  const actionUrl = `/PetServices/src/backend/CRUDmascotas/editar_mascota.php?id=${id}`;

  // Actualiza el atributo action del formulario para incluir el ID de la mascota
  form.action = actionUrl;

  // Mostrar el modal
  modal.classList.remove("hidden");

  // Lógica adicional si necesitas cargar datos específicos de la mascota
  fetch(`/PetServices/api/mascota/${id}`)
    .then((response) => response.json())
    .then((data) => {
      // Llena los campos del formulario con los datos de la mascota
      form.querySelector("[name='nombre']").value = data.nombre;
      form.querySelector("[name='edad']").value = data.edad;
      form.querySelector("[name='edad_meses']").value = data.edad_meses;
      form.querySelector("[name='genero']").value = data.genero;
      form.querySelector("[name='tiene_enfermedad']").value =
        data.tiene_enfermedad;
      form.querySelector("[name='enfermedad']").value = data.enfermedad;
      form.querySelector("[name='historia']").value = data.historia;
      form.querySelector("[name='tipo_mascota']").value = data.tipo_mascota;
      form.querySelector("[name='actividad']").value = data.actividad;
      form.querySelector("[name='peso']").value = data.peso;
      form.querySelector("[name='tamano']").value = data.tamano;

      // Muestra el campo de enfermedad si corresponde
      mostrarCampoEnfermedad();
    })
    .catch((error) => {
      console.error("Error al cargar los datos de la mascota:", error);
    });
}

function closeEditModal() {
  document.getElementById("editPetModal").classList.add("hidden");
}

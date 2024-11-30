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
  fetch(`/PetServices/src/backend/CRUDmascotas/obtener_mascotas.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("editId").value = data.id;
      document.getElementById("editNombre").value = data.nombre;
      document.getElementById("editEdad").value = data.edad;
      document.getElementById("editEdadMeses").value = data.edad_meses;
      document.getElementById("editGenero").value = data.genero;
      document.getElementById("editTieneEnfermedad").value =
        data.tiene_enfermedad;
      document.getElementById("editEnfermedad").value = data.enfermedad;
      document.getElementById("editHistoria").value = data.historia;
      document.getElementById("editTipoMascota").value = data.tipo_mascota;
      document.getElementById("editActividad").value = data.actividad;
      document.getElementById("editPeso").value = data.peso;
      document.getElementById("editTamano").value = data.tamano;

      if (data.tiene_enfermedad === "Si") {
        document.getElementById("campoEditarEnfermedad").style.display =
          "block";
      }

      document.getElementById("editPetModal").classList.remove("hidden");
    });
}

function closeEditPetModal() {
  document.getElementById("editPetModal").classList.add("hidden");
}

function mostrarCampoEditarEnfermedad() {
  const tieneEnfermedad = document.getElementById("editTieneEnfermedad").value;
  const campo = document.getElementById("campoEditarEnfermedad");
  campo.style.display = tieneEnfermedad === "Si" ? "block" : "none";
}

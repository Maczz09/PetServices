document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modal");
  const modalContent = document.getElementById("modal-content");
  const closeModal = document.getElementById("close-modal");

  // Función para abrir el modal con los datos obtenidos
  const openModal = (data) => {
    modalContent.innerHTML = `
            <div class="p-6 space-y-4">
                <h2 class="text-2xl font-bold text-gray-900">Detalles de la Solicitud</h2>
                <p><strong>ID Solicitud:</strong> ${data.solicitud_id}</p>
                <p><strong>Nombre del Usuario:</strong> ${
                  data.usuario_nombre
                } ${data.usuario_apellido}</p>
                <p><strong>Nombre de la Mascota:</strong> ${
                  data.mascota_nombre
                }</p>
                <p><strong>Estado Actual:</strong> ${data.estado_solicitud}</p>
                <p class="mt-4 font-semibold">Preguntas Respondidas:</p>
                <ul class="list-disc list-inside space-y-2">
                    ${data.preguntas
                      .map((pregunta) => `<li>${pregunta}</li>`)
                      .join("")}
                </ul>
                <div class="mt-6 flex justify-end space-x-4">
                    <button id="aprobar-btn" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                        Aprobar
                    </button>
                    <button id="rechazar-btn" class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600">
                        Rechazar
                    </button>
                </div>
            </div>
        `;

    // Botón Aprobar
    document.getElementById("aprobar-btn").addEventListener("click", () => {
      actualizarEstadoSolicitud(data.solicitud_id, "Aprobado");
    });

    // Botón Rechazar
    document.getElementById("rechazar-btn").addEventListener("click", () => {
      actualizarEstadoSolicitud(data.solicitud_id, "Rechazado");
    });

    // Mostrar el modal
    modal.classList.remove("hidden");
  };

  // Función para cerrar el modal
  const closeModalHandler = () => {
    modal.classList.add("hidden");
    modalContent.innerHTML = ""; // Limpia el contenido del modal
  };

  // Añadir evento al botón de cerrar modal
  closeModal.addEventListener("click", closeModalHandler);

  // Añadir eventos a los botones de "Ver Detalles"
  document.querySelectorAll(".open-modal-btn").forEach((button) => {
    button.addEventListener("click", () => {
      const solicitudId = button.getAttribute("data-id");

      // Hacer una solicitud AJAX al servidor para obtener los detalles
      fetch(
        `/PetServices/src/backend/CRUDSolicitudMascotas/getSolicitudDetalles.php?id=${solicitudId}`
      )
        .then((response) => {
          if (!response.ok)
            throw new Error("Error en la respuesta del servidor");
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(data.error);
          } else {
            openModal(data);
          }
        })
        .catch((error) => {
          console.error("Error al cargar los detalles de la solicitud:", error);
          alert("Hubo un error al cargar los detalles. Intenta nuevamente.");
        });
    });
  });

  // Función para actualizar el estado de la solicitud
  const actualizarEstadoSolicitud = (solicitudId, nuevoEstado) => {
    fetch(`/PetServices/src/backend/CRUDSolicitudMascotas/cambiarEstado.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        solicitud_id: solicitudId,
        estado: nuevoEstado,
      }),
    })
      .then((response) => {
        if (!response.ok) throw new Error("Error en la respuesta del servidor");
        return response.json();
      })
      .then((data) => {
        if (data.success) {
          alert("Estado actualizado con éxito");
          closeModalHandler();
          location.reload(); // Recargar la página para reflejar los cambios
        } else {
          alert("Hubo un problema al actualizar el estado.");
        }
      })
      .catch((error) => {
        console.error("Error al actualizar el estado:", error);
        alert("Hubo un error al actualizar el estado. Intenta nuevamente.");
      });
  };
});

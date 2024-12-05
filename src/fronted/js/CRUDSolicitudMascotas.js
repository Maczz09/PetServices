document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("modal");
  const modalContent = document.getElementById("modal-content");
  const closeModalBtn = document.getElementById("close-modal-btn");
  const approveBtn = document.getElementById("approve-btn");
  const rejectBtn = document.getElementById("reject-btn");
  let currentSolicitudId = null; // Variable para almacenar el ID de la solicitud actual

  // Función para abrir el modal y cargar datos
  function openModal(solicitudId) {
    currentSolicitudId = solicitudId; // Guardar el ID de la solicitud actual
    fetch(
      `/PetServices/src/backend/CRUDSolicitudMascotas/getSolicitudDetalles.php?id=${solicitudId}`
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          modalContent.innerHTML = `<p>${data.error}</p>`;
        } else {
          // Llenar datos del usuario
          modalContent.innerHTML = `
          <p><strong>Nombre del Usuario:</strong> ${data.usuario_nombre} ${data.usuario_apellido}</p>
          <p><strong>Email:</strong> ${data.usuario_email}</p>
          <p><strong>Dirección:</strong> ${data.usuario_direccion}</p>
          <p><strong>Teléfono:</strong> ${data.usuario_telefono}</p>
          <p><strong>Nombre de la Mascota:</strong> ${data.mascota_nombre}</p>
          <p><strong>Tipo de Mascota:</strong> ${data.mascota_tipo}</p>
          <p><strong>Estado de la Solicitud:</strong> ${data.estado_solicitud}</p>
        `;

          // Llenar preguntas respondidas
          const questionsContent = `
          <p><strong>1. ¿Por qué desea adoptar una mascota?</strong></p>
          <p class="pl-4">${data.pregunta1}</p>
          <p><strong>2. ¿Quién será el propietario de la mascota?</strong></p>
          <p class="pl-4">${data.pregunta2}</p>
          <p><strong>3. ¿Tiene una vivienda propia o arrienda?</strong></p>
          <p class="pl-4">${data.pregunta3}</p>
          <p><strong>4. ¿Qué tipo de vivienda posee?</strong></p>
          <p class="pl-4">${data.pregunta4}</p>
          <p><strong>5. ¿Por qué considera apropiado adoptar esta mascota?</strong></p> 
          <p class="pl-4">${data.pregunta5}</p>
          <p><strong>6. ¿Su familia está de acuerdo con la adopción?</strong></p>
          <p class="pl-4">${data.pregunta6}</p>
          <p><strong>7. ¿Qué hará si la mascota llega a enfermarse?</strong></p>
          <p class="pl-4">${data.pregunta7}</p>
          <p><strong>8. ¿Ha cambiado de domicilio los últimos años?</strong></p>
          <p class="pl-4">${data.pregunta8}</p>
          <p><strong>9. En caso de vivir con niños, ¿ellos saben cómo cuidar a la mascota?</strong></p>
          <p class="pl-4">${data.pregunta9}</p>
          <p><strong>10. ¿Usted o alguno de sus convivientes tiene alguna alergia?</strong></p>
          <p class="pl-4">${data.pregunta10}</p>
          <p><strong>11. ¿Dispone de tiempo para invertir en la mascota?</strong></p>
          <p class="pl-4">${data.pregunta11}</p>
          <p><strong>12. ¿Si llega a viajar, con quién quedaría la mascota?</strong></p>
          <p class="pl-4">${data.pregunta12}</p>
          <p><strong>13. ¿Es la primera mascota que ha adoptado?</strong></p>
          <p class="pl-4">${data.pregunta13}</p>
          <p><strong>14. ¿En su hogar convive con otras mascotas?</strong></p>
          <p class="pl-4">${data.pregunta14}</p>
        `;

          document.getElementById("modal-questions").innerHTML =
            questionsContent;
        }
        modal.classList.remove("hidden");
      })
      .catch((error) => {
        modalContent.innerHTML = `<p>Error al cargar los detalles: ${error}</p>`;
        modal.classList.remove("hidden");
      });
  }

  // Vincular botones para abrir el modal
  document.querySelectorAll(".open-modal-btn").forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      const solicitudId = this.getAttribute("data-id");
      openModal(solicitudId);
    });
  });

  // Cerrar modal
  closeModalBtn.addEventListener("click", function () {
    modal.classList.add("hidden");
  });

 // Aprobar solicitud
 approveBtn.addEventListener("click", function () {
  if (currentSolicitudId) {
    fetch("/PetServices/src/backend/CRUDSolicitudMascotas/cambiarEstado.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `id=${currentSolicitudId}&estado=Aceptada`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Solicitud aprobada exitosamente");
          modal.classList.add("hidden");
          location.reload(); // Recargar la página para actualizar la lista
        } else {
          alert("Error al aprobar la solicitud: " + data.error);
        }
      })
      .catch((error) => {
        alert("Error al enviar la solicitud: " + error);
      });
  }
});

// Rechazar solicitud
rejectBtn.addEventListener("click", function () {
  if (currentSolicitudId) {
    fetch("/PetServices/src/backend/CRUDSolicitudMascotas/cambiarEstado.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `id=${currentSolicitudId}&estado=Negado`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Solicitud rechazada exitosamente");
          modal.classList.add("hidden");
          location.reload(); // Recargar la página para actualizar la lista
        } else {
          alert("Error al rechazar la solicitud: " + data.error);
        }
      })
      .catch((error) => {
        alert("Error al enviar la solicitud: " + error);
      });
  }
});
});
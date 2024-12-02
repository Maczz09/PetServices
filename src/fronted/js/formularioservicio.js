document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.servicecard-button'); // Selecciona los botones "Ver más"
  const formularioCita = document.getElementById('formularioCita');
  const idservicioInput = document.getElementById('idservicio'); // Campo oculto para el ID del servicio
  const nombreServicioInput = document.getElementById('nombre'); // Campo visible para el nombre del servicio

  // Añadir evento a cada botón
  buttons.forEach((button) => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      // Obtener los datos del servicio desde los atributos data
      const serviceCard = this.closest('.servicecard');
      const serviceId = serviceCard.getAttribute('data-idservicio');
      const serviceName = serviceCard.getAttribute('data-service');

      // Llenar los campos del formulario
      idservicioInput.value = serviceId; // Establece el ID del servicio en el campo oculto
      nombreServicioInput.value = serviceName; // Establece el nombre del servicio en el campo visible

      // Mostrar el formulario
      formularioCita.classList.remove('formservicio-hidden');
      formularioCita.classList.add('formservicio-visible');
    });
  });

  // Cerrar el formulario al hacer clic fuera de él
  formularioCita.addEventListener('click', function (e) {
    if (e.target === this) {
      this.classList.remove('formservicio-visible');
      this.classList.add('formservicio-hidden');
    }
  });

  // Evitar cerrar el formulario al hacer clic dentro del contenedor
  document.querySelector('.formservicio-container').addEventListener('click', function (e) {
    e.stopPropagation(); // Detiene la propagación del evento
  });
});


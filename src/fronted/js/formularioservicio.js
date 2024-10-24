document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('.servicecard-button');  // Selecciona los botones "Ver más"
  const formularioCita = document.getElementById('formularioCita');
  const idservicioInput = document.getElementById('idservicio'); // Cambiar a 'idservicio' para coincidir con la base de datos
  const nombreServicio = document.getElementById('nombreServicio'); // Campo para mostrar el nombre del servicio al usuario

  buttons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault(); // Previene el comportamiento por defecto del enlace
      const serviceCard = this.closest('.servicecard');
      const serviceId = serviceCard.dataset.idservicio;
      const serviceName = serviceCard.dataset.service;

      idservicioInput.value = serviceId; // Establece el id del servicio en el formulario (para la base de datos)
      nombreServicio.textContent = serviceName; // Muestra el nombre del servicio al usuario

      // Cambia las clases para mostrar el formulario como un modal
      formularioCita.classList.remove('formservicio-hidden');
      formularioCita.classList.add('formservicio-visible');
    });
  });

  // Cerrar el formulario al hacer clic fuera de él
  formularioCita.addEventListener('click', function(e) {
    if (e.target === this) {
      this.classList.remove('formservicio-visible');
      this.classList.add('formservicio-hidden');
    }
  });

  // mantener la funcionalidad de scroll
  document.querySelector('.formservicio-container').addEventListener('click', function(e) {
    e.stopPropagation(); // Evita que el clic en el formulario cierre el modal
   });
});

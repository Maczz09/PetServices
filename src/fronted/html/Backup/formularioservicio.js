document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('.servicecard-button');  // Selecciona los botones "Ver más"
  const formularioCita = document.getElementById('formularioCita');
  const servicioInput = document.getElementById('nombre'); // Cambiado de 'servicio' a 'nombre' para coincidir con el HTML

  buttons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault(); // Previene el comportamiento por defecto del enlace
      const serviceName = this.closest('.servicecard').dataset.service;
      servicioInput.value = serviceName; // Establece el valor del campo servicio
      
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